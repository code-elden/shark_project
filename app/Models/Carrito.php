<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    use HasFactory;

    protected $table = 'carritos';

    protected $fillable = [
        'cantidad',
        'precio',
        'user_id',
        'producto_id',             
    ];

    public function User(){
        return $this->belongsTo(User::class);
    }

    public function Producto(){
        return $this->belongsTo(Producto::class);
    }

    public function __toString()
    {
        return $this->Producto()->nombre . '';
    }
}
