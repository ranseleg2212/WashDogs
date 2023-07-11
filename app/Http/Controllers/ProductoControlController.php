<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class ProductoControlController extends Component
{
    public $productoed;
    public $name, $description, $price, $thumbnail;
    use WithFileUploads;

    public function render()
    {
        return view('administrador.editar');
    }

    public function editar(Product $product)
    {
        return view('administrador.editar', compact('product'));
    }
    public function editar_producto(Request $request, Product $product)
    {
        if ($request->hasFile('imagen')) {
            Storage::delete($product->thumbnail);
            $product->thumbnail = $request->file('imagen')->store('public/images');
            $product->name = $request->nombre_txt;
            $product->price = $request->precio_txt;
            $product->description = $request->descripcion_txt;
            $product->status = $request->estado_txt;
            if ($product->status == 'OFERTA') {
                $product->precio_oferta = $request->precio_oferta_txt;
            } else {
                $product->precio_oferta = $product->price;
            }
            $product->save();
        } else {
            $product->name = $request->nombre_txt;
            $product->price = $request->precio_txt;
            $product->description = $request->descripcion_txt;
            $product->status = $request->estado_txt;
            if ($product->status == 'OFERTA') {
                $product->precio_oferta = $request->precio_oferta_txt;
            } else {
                $product->precio_oferta = $product->price;
            }
            $product->save();
        }
        return redirect()->route('mostrar_productos');
    }

    //MOSTRAR TODOS LOS PRODUCTOS
    public function mostrar_productos(Request $requesttexto)
    {
        $texto = $requesttexto->textoproducto ?? null;
        if ($texto == null) {
            return view('administrador.productos', [
                'products' => Product::orderBy('status','desc')->paginate(10)
            ]);
        } else if ($texto == 'Activos') {
            $products = Product::where('status', '=', 'ACTIVO')->paginate(10);
            return view('administrador.productos', compact('products', 'texto'));
        } else if ($texto == 'Inactivos') {
            $products = Product::where('status', '=', 'INACTIVO')->paginate(10);
            return view('administrador.productos', compact('products', 'texto'));
        } else if ($texto == 'Oferta') {
            $products = Product::where('status', '=', 'OFERTA')->paginate(10);
            return view('administrador.productos', compact('products', 'texto'));
        } else {
            $products = Product::where('name', 'LIKE', '%' . $texto . '%')->paginate(10);
            return view('administrador.productos', compact('products', 'texto'));
        }
    }

    //MOSTRAR UN PRODUCTO
    public function mostrar_producto($id)
    {
        $product = Product::find($id);
        return view('administrador.mostrar', compact('product'));
    }

    public function save(Request $registro)
    {
        $producto = new Product();
        $producto->name = $registro->name;
        $producto->price = $registro->price;
        $producto->description = $registro->description;
        $producto->thumbnail = $registro->file('imagen')->store('public/images');
        $producto->precio_oferta = $registro->price;
        $producto->save();
        return redirect('/administrador/productos');
    }
}
