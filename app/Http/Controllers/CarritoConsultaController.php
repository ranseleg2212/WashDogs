<?php

namespace App\Http\Controllers;

use App\Models\CartManager;
use Illuminate\Http\Request;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\ShoppingCart;
use App\Models\Product;

class CarritoConsultaController extends Component
{

    public function render()
    {
        return view('administrador.carritos');
    }

    //MOSTRAR TODOS LOS CARRITOS
    public function mostrar_carritos(Request $requesttexto)
    {
        $texto = $requesttexto->textocarrito;
        if ($texto == null) {
            return view('administrador.carritos', [
                'carritos' => DB::table('shopping_carts')
               ->join('users', 'shopping_carts.usuario', '=', 'users.id')
               ->select('shopping_carts.*', 'users.name')
               ->paginate(10)
            ]);
        } else {
            return view('administrador.carritos', [
               'carritos' => DB::table('shopping_carts')
               ->join('users', 'shopping_carts.usuario', '=', 'users.id')
               ->select('shopping_carts.*', 'users.name')
               ->where('users.name', 'LIKE', '%'. $texto. '%')
               ->paginate(10),
               $texto
            ]);
        }
    }

    //MOSTRAR UN PRODUCTO
    public function mostrar_carrito($id)
    {
        $carrito = ShoppingCart::find($id);
        $products = $carrito->products;
        $usuario = $carrito->user;
        $productos = Product::all();
            return view('administrador.detalle_carrito', compact('carrito','products', 'usuario','productos'));
    }

    public function save(Request $registro)
    {
        $producto = new Product();
        $producto->name = $registro->name;
        $producto->price = $registro->price;
        $producto->description = $registro->description;
        $producto->thumbnail = $registro->file('imagen')->store('public/images');
        $producto->save();
        return redirect('/productos');
    }

    public function deleteProduct($cart_id, $product_id)
    {
        $cart = ShoppingCart::find($cart_id);
        $cart->products()->detach($product_id);
    
        return redirect()->route('mostrar_carrito', ['id' => $cart_id]);
    }
    
}
