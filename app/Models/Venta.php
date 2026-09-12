<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
protected $table = 'ventas';
protected $fillable = ['libro_id', 'correo_cliente', 'cantidad', 'precio_total'];

public function libro() {
    return $this->belongsTo(Libro::class, 'libro_id');
}
}