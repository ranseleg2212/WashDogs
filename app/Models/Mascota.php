<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Order;

/**
 * Class Mascota
 *
 * @property $mascota_id
 * @property $id_user
 * @property $nombre
 * @property $raza
 * @property $condicion
 * @property $edad
 * @property $genero
 *
 * @property Order[] $orders
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */


class Mascota extends Model
{
    protected $table = 'mascotas';

    static $rules = [
        'id_user' => 'required',
        'nombre' => 'required',
        'raza' => 'required',
        'condicion' => 'required',
        'edad' => 'required',
        'genero' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_user', 'nombre', 'raza', 'condicion', 'edad', 'genero'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders()
    {
        return $this->hasMany(Order::class, 'mascota_id', 'mascota_id');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'id_user');
    }
}
