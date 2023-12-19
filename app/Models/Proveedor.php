<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;
    protected $table = 'proveedores';

    protected $fillable = [
        'id',
        'nit',
        'empresa'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id');
    }
}
