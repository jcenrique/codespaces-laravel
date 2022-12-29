<?php

namespace App\Models;

use App\Orchid\Presenters\LineaPresenter;
use App\Orchid\Presenters\ZonaPresenter;use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Linea extends Model
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

    public function zonas()
    {
        return $this->belongsToMany(Zona::class);
    }

    public function puntos()
    {
        return $this->belongsToMany(Punto::class);
    }

    public function presenter()
    {
        return new LineaPresenter($this);
    }

}
