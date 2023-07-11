<?php

namespace App\Http\Livewire\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Http\Request;

class Create extends Component
{
    public $name, $description, $price, $thumbnail;
    use WithFileUploads;

    public function render()
    {
        return view('administrador.create')
        ->extends('administrador.admin')
        ->section('contenido_administrador');
    }

    public function save(Request $request, Product $producto)
    {
        $producto -> name=$request->name;
        $producto -> price=$request->price;
        $producto -> description=$request->description;
        $producto->thumbnail = $request->file('thumbnail')->store('public/images');
        $producto->save();
        return view('administrador.productos');

    }
}
