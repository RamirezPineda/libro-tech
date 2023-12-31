<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    use HasFactory;
    protected $table = 'detalle_ventas';

    protected $fillable = [
        'cantidad',
        'total',
        'id_venta',
        'id_producto'
    ];


    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }
}
