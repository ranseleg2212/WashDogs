<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\ShoppingCart;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use App\Mail\ConfirmationShopping;
use App\Mail\NotificacionMail;
use App\Mail\ProductoCMail;
use Illuminate\Support\Facades\Mail;
use App\Models\CartManager;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Mascota;


use Illuminate\Http\Request;

class PedidoController extends Controller
{
    private string $sessionName = 'shopping_cart_id';
    // !ADMINISTRADOR
    public function pedidos_inicio()
    {
        return view('administrador.inicio', [
            'pedidostt' => Order::all()->count(),
            'pedidosep' => Order::all()->where('status', '=', 'En proceso')->count(),
            'pedidosre' => Order::all()->where('status', '=', 'Registrado')->count(),
            'pedidosen' => Order::all()->where('status', '=', 'Entregado')->count(),
            'pedidosca' => Order::all()->where('status', '=', 'Cancelado')->count(),
            'productac' => Product::all()->where('status', '=', 'ACTIVO')->count(),
            'productin' => Product::all()->where('status', '=', 'INACTIVO')->count(),
            'productof' => Product::all()->where('status', '=', 'OFERTA')->count(),
            'producttt' => Product::all()->count(),
            'neworders' => Order::where('status', '=', 'Registrado')->paginate(10),
            'neworderscount' => Order::where('status', '=', 'Registrado')->count()
        ]);
    }

    public function mostrar_pedidos(Request $request)
    {
        $texto = $request->texto;

        if ($texto == null) {
            $pedidos = Order::with('user', 'mascota')
                ->latest()
                ->paginate(10);

            $pedidosnuevos = Order::where('status', '=', 'Registrado')
                ->orderByDesc('created_at')
                ->paginate(10);

            return view('administrador.pedidos', compact('pedidos', 'pedidosnuevos'));
        } else {
            $pedidos = Order::with(['user', 'mascota'])
            ->where(function ($query) use ($texto) {
                $query->whereHas('user', function ($query) use ($texto) {
                    $query->where('name', 'LIKE', '%' . $texto . '%')
                        ->orWhere('email', 'LIKE', '%' . $texto . '%');
                })
                ->orWhereHas('mascota', function ($query) use ($texto) {
                    $query->where('nombre', 'LIKE', '%' . $texto . '%');
                })
                ->orWhere('status', '=', $texto)
                ->orWhere('id', '=', $texto);
            })
            ->paginate(10);

            $pedidosnuevos = Order::where('status', '=', 'Registrado')
                ->paginate(10);

            return view('administrador.pedidos', compact('pedidos', 'texto', 'pedidosnuevos'));
        }
    }


    public function detalle_pedido($id)
    {
        $order = Order::with(['mascota', 'user'])->find($id);
        return view('administrador.detalle_pedido', compact('order'));
    }

    public function estado(Request $estado, Order $pedido)
    {

        if ($estado->estado_seli == 'Cancelado') {
            $pedido->status = $estado->estado_seli;
            $pedido->comentario = $estado->razon_cancelacion;
            $pedido->save();
        } else {
            $pedido->status = $estado->estado_seli;
            $pedido->save();
        }

        return view('administrador.pedidos', [
            'pedidos' => Order::orderBy('created_at', 'desc')->paginate(10),
            'pedidosnuevos' => Order::where('status', '=', 'Registrado')->paginate(10),
            session()->flash('messagepedido', 'Se cambio el estado al pedido ' . $pedido->id)
        ]);
    }

    // !USUARIO
    public function guardar(ShoppingCart $cart, $id, $total, Request $request)
    {
        $order = Order::create([
            'shopping_cart_id' => $cart->id,
            'id_user' => $id,
            'total' => $total,
            'token' => Str::random(50),
            'fecha' => $request->input('fecha_preferencia'),
            'mascota_id' => $request->mascota
        ]);
        $shoppingCart = ShoppingCart::find($cart->id);
        $shoppingCart->status = 1;
        $shoppingCart->save();
        $user = User::find($id);
        $mascota = Mascota::where('mascota_id', '=', $request->mascota)->first();

        // Enviar correo de confirmación al usuario autenticado
        Mail::to(Auth::user()->email)->send(new ConfirmationShopping($order, $user, $mascota));

        // Enviar correo de notificación a la dirección 'ranseleg2212@gmail.com'
        Mail::to('ranseleg2212@gmail.com')->send(new NotificacionMail($order, $user, $mascota));
        session()->flash('message', 'Gracias por tu compra, te estaremos contactando');
        //(app(CartManager::class))->deleteSession();
        Session::forget($this->sessionName);
        return redirect('/');
    }

    public function mostrar_pedidos_usuario()
    {
        $pedmost = Order::with(['mascota', 'user'])
            ->where('id_user', '=', auth()->id())
            ->orderByDesc('created_at')
            ->get();

        return view('livewire.compra', compact('pedmost'));
    }

    public function detalle($token)
    {
        return view('livewire.products.detalle_compra', [
            // 'order' => Order::find($id)
            'order' => Order::with(['mascota', 'user'])
                ->where('token', $token)
                ->where('id_user', '=', Auth::user()->id)
                ->firstOrFail()
        ]);
    }

    public function cambiar_fecha($id_pedido, Request $request)
    {
        $fecha = $request->input('fecha_hora');
        $pedido = $request->input('pedido_txt');
        Order::where('id', $pedido)
        ->update([
            'fecha' => $fecha
        ]);
        return redirect()->route('detalle_pedido', ['id' => $pedido]);
    }

}
