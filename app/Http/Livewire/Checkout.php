<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CartManager;
use App\Models\Mascota;
use Illuminate\Support\Facades\Auth;

class Checkout extends Component
{
    public $cart;


    public function mount(CartManager $cart)
    {
        //$this->stripeKey = config('services.paypal.key');
        $this->cart = $cart->getCart();
    }

    public function render()
    {
        $cartItems = $this->cart->products()->get();
        $subtotal = 0;
        foreach ($cartItems as $item) {
            $subtotal += $item->precio_oferta * 1;
        }
        $mascotas = Mascota::where("id_user","=",Auth::user()->id)->get();

        $total = $subtotal;

        return view('livewire.checkout', [
            'products' => $this->cart->products,
            'cartItems' => $cartItems,
            'subtotal' => $subtotal,
            'total' => $total,
            'mascotas' => $mascotas
        ])
            ->extends('layouts.app')
            ->section('content');
    }

    public function deleteProduct(CartManager $cart, $productId)
    {
        $cart->deleteProduct($productId);
        session()->flash('message', 'Product deleted');
        $this->emitTo('cart', 'addToCart');
        $this->emitTo('cart', 'addToCarts');
    }

    public function decreaseProductQuantity($productId)
    {
        $this->cart->decreaseProductQuantity($productId);
        $this->emitTo('cart', 'addToCart');
        $this->emitTo('cart', 'addToCarts');
    }

    public function increaseProductQuantity(CartManager $cart, $productId)
    {
        $cart->increaseProductQuantity($productId);
        $this->emitTo('cart', 'addToCart');
        $this->emitTo('cart', 'addToCarts');
    }


    public function hydrate()
    {
        $this->cart = (app(CartManager::class))->getCart();
    }
}
