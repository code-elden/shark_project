<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'dni',
        'nombres',
        'apellidos',
        'direccion',
        'telefono',
        'name', 
        'email', 
        'password',
        'rol_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function Rol(){
        return $this->belongsTo(Rol::class);
    }

    public function carritos(){
        return $this->hasMany(Carrito::class);
    }

    public function __toString()
    {
        return $this->nombres . ' ' . $this->apellidos;
    }
}
