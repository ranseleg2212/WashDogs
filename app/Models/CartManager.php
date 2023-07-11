<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;


class CartManager
{
    private string $sessionName = 'shopping_cart_id';
    private $cart;

    public function __construct()
    {
        $this->cart = $this->findOrCreate();
    }

    private function findOrCreate()
    {
        $cart = null;
        $cart = ShoppingCart::where('usuario', Auth::id())->where('status', 0)->first();
        if (is_null($cart)) {
            $cart = ShoppingCart::create([
                'usuario' => Auth::id()
            ]);
        }
        session([$this->sessionName => $cart->id]);

        return $cart;
    }

    private function findSession()
    {
        return session($this->sessionName);
    }

    public function getCart()
    {
        return $this->cart;
    }

    public function addToCart($productId): void
    {
        $product = $this->getProduct($productId);

        $existingProduct = $this->cart->products()->find($productId);

        if ($existingProduct) {
            $this->cart->products()->updateExistingPivot($productId);
        } else {
            $this->cart->products()->attach($productId);
        }
    }

    public function getProduct($productId)
    {
        return Product::where('slug', $productId)->first();
    }

    public function deleteProduct($productId)
    {
        return $this->cart->products()->wherePivot('id', $productId)->detach();
        return redirect()->route('checkout', Auth::user()->id);
    }

    public function getAmount()
{
    $total = 0;

    foreach ($this->cart->products as $product) {
        $total += $product->precio_oferta;
    }

    return $total;
}



    public function deleteSession()
    {
        return request()->session()->forget($this->sessionName);
    }

    // public function increaseProductQuantity($productId)
    // {
    //     $cartItem = $this->cart->products()->where('product_id', $productId)->firstOrFail();

    //     $newQuantity = $cartItem->pivot->cantidad + 1;

    //     $this->cart->products()->updateExistingPivot($productId, ['cantidad' => $newQuantity]);

    //     $this->cart->refresh();

    //     return $this->cart;
    // }

}
