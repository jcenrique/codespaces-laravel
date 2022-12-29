<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Punto extends Model
{

    use HasFactory;
    use AsSource;
    use Filterable;

    protected $fillable = [
        'name',
        'direction',
        'indication',
        'type'
    ];

    protected $allowedSorts = [
        'id',
        'name',
        'type',

    ];

    public function lineas()
    {
        return $this->belongsToMany(Linea::class);
    }

    public function coordenada()
    {
        return $this->hasOne(Coordenada::class);
    }
}
