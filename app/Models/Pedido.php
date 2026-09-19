<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_pedido',
        'cliente',
        'email',
        'telefono',
        'direccion',
        'total',
        'estado',
    ];

    protected $casts = [
        'total' => 'decimal:2',
    ];
}