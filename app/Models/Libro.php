<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
protected $table = 'libros';
protected $fillable = ['titulo', 'precio', 'stock', 'autor_id'];

public function autor() {
    return $this->belongsTo(Autor::class, 'autor_id');
}

public function ventas() {
    return $this->hasMany(Venta::class, 'libro_id');
}
}