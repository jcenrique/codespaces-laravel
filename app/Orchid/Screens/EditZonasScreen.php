<?php

namespace App\Orchid\Screens;

use App\Models\Zona;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class EditZonasScreen extends Screen
{

    public $zona;
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(Zona $zona): iterable
    {
        return [
            'zona' => $zona
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->zona->exists? __('Editar zona'): __('Crear Zona');
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Button::make(__('Crear Zona'))
                ->icon('pencil')
                ->method('createOrUpdate')
                ->canSee(!$this->zona->exists),

            Button::make(__('Actualizar'))
                ->icon('note')
                ->method('createOrUpdate')
                ->canSee($this->zona->exists),

            Button::make(__('Eliminar'))
                ->icon('trash')
                ->method('remove')
                ->canSee($this->zona->exists),
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
            Layout::rows([
                Input::make('zona.name')
                    ->title(__('Nombre'))
                    ->placeholder(__('Introducir el nombre de la zona'))
                    ->required(),


                TextArea::make('zona.description')
                    ->title(__('Description'))
                    ->rows(3)
                    ->maxlength(200),



            ])
        ];
    }
    public function createOrUpdate(Zona $zona, Request $request)
    {
        $zona_id= $zona->id;
        $zona->fill($request->get('zona'))->save();

        Alert::info($zona_id==null? __('Registro creado con éxito'): __('Registro actualizado con éxito'));

        return redirect()->route('platform.zona.list');
    }

    /**
     * @param Post $post
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function remove(Zona $zona)
    {
        $zona->delete();

        Alert::info(__('El registro se ha eliminado correctamente.'));

        return redirect()->route('platform.zona.list');
    }
}
