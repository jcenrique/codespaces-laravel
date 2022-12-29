<?php

namespace App\Orchid\Screens;

use App\Models\Zona;
use App\Orchid\Layouts\ZonaListLayout;
use Orchid\Screen\Actions\Link;

use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Layout;

class ZonasScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'zonas' => Zona::with('lineas')->filters()->defaultSort('name')->paginate(),

        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Zonas';
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
                ->route('platform.zona.edit')
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
            ZonaListLayout::class,





        ];
    }
}
