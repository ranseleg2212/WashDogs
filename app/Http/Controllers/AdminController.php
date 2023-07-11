<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;

class AdminController extends Controller
{
    public function __invoke()
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
            'neworders' => Order::where('status','=','Registrado')->paginate(10),
            'neworderscount' => Order::where('status','=','Registrado')->count()
        ]);
    }

}
