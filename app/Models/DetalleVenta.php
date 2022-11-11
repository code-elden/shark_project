<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    use HasFactory;

    protected $table = 'detalle_ventas';

    protected $fillable = [
        'venta_id',
        'producto_id',
        'cantidad',
        'precio',
    ];

    public function Venta(){
        return $this->belongsTo(Venta::class);
    }

    public function Producto(){
        return $this->belongsTo(Producto::class);
    }

    public function __toString()
    {
        return $this->nro_venta;
    }
}
