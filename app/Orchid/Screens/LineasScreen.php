<?php

namespace App\Orchid\Screens;

use App\Models\Linea;
use App\Orchid\Layouts\LineaListLayout;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;

class LineasScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */

    public function query(): iterable
    {
        return [
            'lineas' => Linea::filters()->defaultSort('name')->with('zonas')->paginate(),

        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Lineas';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make(__('Crear nueva'))
                ->icon('pencil')
                ->route('platform.linea.edit')
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            LineaListLayout::class,





        ];
    }
}
