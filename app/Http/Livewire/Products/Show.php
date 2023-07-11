<?php

namespace App\Http\Livewire\Products;

use Livewire\Component;
use App\Models\Product;
use App\Models\CartManager;

class Show extends Component
{
    public $product;

    public function render()
    {
        return view('livewire.products.show')
            ->extends('layouts.app')
            ->section('content');
    }

    public function mount(Product $product)
    {
        $this->product = $product;
    }

    public function addToCart(CartManager $cart, $productId)
    {
        $cart->addToCart($productId);
        session()->flash('Mensaje', 'Producto agregado al carrito');
        $this->emitTo('cart', 'addToCart');
    }

}
