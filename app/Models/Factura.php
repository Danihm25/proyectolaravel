<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model {
    protected $fillable = ['cliente', 'monto', 'estado', 'fecha_emision'];
}
