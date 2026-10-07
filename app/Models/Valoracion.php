<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Valoracion extends Model
{
    protected $table = 'valoraciones';

    protected $fillable = [
        'producto_id',
        'puntuacion',
    ];

    protected $casts = [
        'puntuacion' => 'integer',
    ];

    public function producto(): BelongsTo
    {
        return $this->belongsTo(Producto::class);
    }
}