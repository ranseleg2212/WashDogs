<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    use HasFactory;

    protected $fillable = [
        'usuario'
    ];

    public function productCount()
    {

    }

    public function amount()
    {
        $productCount = $this->products->count() ?? 0;
        return $productCount;
    }


    public function products(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Product::class)->withPivot('id');
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'usuario');
    }

    public function decreaseProductQuantity($productId)
    {
        $existingProduct = $this->products()->find($productId);

        if ($existingProduct) {
            $pivotData = $existingProduct->pivot;
            $newQuantity = max(1, $pivotData->cantidad - 1);

            $this->products()->updateExistingPivot($productId, ['cantidad' => $newQuantity]);
        }
    }






}
