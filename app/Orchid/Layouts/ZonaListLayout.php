<?php

namespace App\Orchid\Layouts;

use App\Models\Zona;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class ZonaListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'zonas';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('name',__('Nombre'))
                ->sort()
                ->render(function (Zona $zona) {
                return Link::make($zona->name)
                    ->route('platform.zona.edit', $zona);
            }),


            TD::make('description', __('Descripción')),

        ];
    }
}
