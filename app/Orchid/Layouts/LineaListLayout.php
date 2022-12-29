<?php

namespace App\Orchid\Layouts;

use App\Models\Linea;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class LineaListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'lineas';

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
                ->render(function (Linea $linea) {

                    return Link::make($linea->name )

                   ->route('platform.linea.edit', $linea);
            }),

            TD::make('zonas')
            ->render(function (Linea $linea) {
                return $linea->presenter()->subTitle();
            }),


            TD::make('description', __('Descripción')),

            TD::make('created_at', __('Created'))
            ->sort()
            ->render(fn (Linea $linea) => $linea->created_at->toDateTimeString()),

            TD::make('updated_at', __('Last edit'))
            ->sort()
            ->render(fn (Linea $linea) => $linea->updated_at->toDateTimeString()),
        ];
    }
}
