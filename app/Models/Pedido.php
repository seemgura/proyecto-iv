<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    protected function casts(): array
    {
        return [
            'total' => 'decimal:2',
        ];
    }

    public function detalles(): HasMany
    {
        return $this->hasMany(DetallePedido::class);
    }
}
