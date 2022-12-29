<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Zona extends Model
{
    use HasFactory;
    use AsSource;
    use Filterable;

    protected $fillable = [
        'name',
        'description'
    ];

    protected $allowedSorts = [
        'id',
        'name',
        'created_at',
        'deleted_at',
    ];

    public function lineas()
    {
        return $this->belongsToMany(Linea::class);
    }
}
