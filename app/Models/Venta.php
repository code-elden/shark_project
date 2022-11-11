<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    protected $table = 'ventas';

    protected $fillable = [
        'nro_venta',
        'user_id',
        'fecha',
        'total',
    ];

    public function User(){
        return $this->belongsTo(User::class);
    }

    public function detalleventas(){
        return $this->hasMany(DetalleVenta::class);
    }

    public function __toString()
    {
        return $this->nro_venta;
    }
}
