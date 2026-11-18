<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;

    /**
     * Campos asignables en masa.
     */
    protected $fillable = [
        'titulo',
        'autor',
        'anio',
        'categoria_id',
        'disponible',
    ];

    /**
     * Relación pertenece a una categoría.
     */
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    /**
     * Scope para filtrar por categoría.
     *
     * Acepta ID numérico o nombre (parcial) de la categoría.
     * - Si es numérico: filtro directo por `categoria_id`.
     * - Si es texto: usa `whereHas` para buscar por el campo `nombre` de la tabla `categorias`.
     */
    public function scopeCategoria(Builder $query, $value)
    {
        return is_numeric($value)
            ? $query->where('categoria_id', $value)
            : $query->whereHas('categoria', function (Builder $q) use ($value) {
                $q->where('nombre', 'LIKE', "%{$value}%");
            });
    }

    /**
     * Scope para buscar coincidencia parcial en el título del libro.
     */
    public function scopeTitulo(Builder $query, string $texto)
    {
        return $query->where('titulo', 'LIKE', "%{$texto}%");
    }
}
