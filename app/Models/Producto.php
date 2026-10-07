<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'slug',
        'categoria',
        'descripcion',
        'precio',
        'stock',
        'imagen',
        'destacado',
        'activo',
    ];

    protected $casts = [
        'precio' => 'decimal:2',
        'stock' => 'integer',
        'destacado' => 'boolean',
        'activo' => 'boolean',
    ];

    public function valoraciones(): HasMany
    {
        return $this->hasMany(Valoracion::class);
    }
}