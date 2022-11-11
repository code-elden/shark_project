<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';

    protected $fillable = [
        'nombre', 
        'caracteristicas',
        'stock',  
        'precio', 
        'imagen', 
        'categoria_id',
    ];

    public function ventas(){
        return $this->hasMany(Venta::class);
    }

    public function carritos(){
        return $this->hasMany(Carrito::class);
    }

    public function detalleventas(){
        return $this->hasMany(DetalleVenta::class);
    }

    public function Categoria(){
        return $this->belongsTo(Categoria::class);
    }

    public function __toString()
    {
        return $this->nombre;
    }
}
