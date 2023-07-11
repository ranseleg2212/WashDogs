<?php

namespace App\Models;

use App\Mail\ConfirmationShopping;
use App\Mail\NotificacionMail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use App\Models\User;
use App\Models\Mascota;


class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'shopping_cart_id',
        'total',
        'id_user',
        'status',
        'token',
        'mascota_id',
        'fecha',
    ];

    public function shoppingCart(): BelongsTo
    {
        return $this->belongsTo(ShoppingCart::class);
    }


    public function isFromStripe(): bool
    {
        return $this->name == null ? true : false;
    }

    protected static function booted()
    {
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    public function mascota()
    {
        return $this->belongsTo(Mascota::class, 'mascota_id', 'mascota_id');
    }


}
