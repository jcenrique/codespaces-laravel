<?php

namespace App\Orchid\Screens;

use App\Http\Requests\StoreLineasRequest;
use App\Models\Linea;
use App\Models\Zona;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;
use Termwind\Components\Li;

class EditLineaScreen extends Screen
{
    public $linea;
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(Linea $linea): iterable
    {

        return [
            'linea' => $linea
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {

        return $this->linea->exists ? __('Editar Línea'): __('Crear Línea');
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Button::make('Crear Linea')
                ->icon('pencil')
                ->method('createOrUpdate')
                ->canSee(!$this->linea->exists),

            Button::make('Actualizar')
                ->icon('note')
                ->method('createOrUpdate')
                ->canSee($this->linea->exists),

            Button::make('Eliminar')
                ->icon('trash')
                ->method('remove')
                ->canSee($this->linea->exists),
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
                Input::make('linea.id')
                    ->hidden(),
                Input::make('linea.name')
                    ->title(__('Nombre'))
                    ->placeholder(__('Introducir el nombre de la linea')),
                  //  ->required(),


                TextArea::make('linea.description')
                    ->title(__('Description'))
                    ->rows(3)
                    ->maxlength(200),

                    Select::make('linea.zonas')
                    ->title(__('Zonas'))
                    ->fromModel(Zona::class, 'name')
                    ->multiple()
                    ->required()
                    ->help(__('Elegir una zona')),

            ])
        ];
    }
    public function createOrUpdate(Linea $linea, StoreLineasRequest $request)
    {

        $zonas_id=$request->get('linea')['zonas'];
        $linea_id = $linea->id;

        $linea->fill($request->get('linea'))->save();
        $linea->zonas()->detach();
        foreach ($zonas_id as $key) {
            $linea->zonas()->attach($key);
        }


        Alert::info( $linea_id ==null?__('Registro creado con éxito'):__('Registro actualizado con éxito'));

        return redirect()->route('platform.linea.list');
    }

    /**
     * @param Post $post
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function remove(Linea $linea)
    {
        $linea->delete();

        Alert::info(__('El registro se ha eliminado correctamente.'));

        return redirect()->route('platform.linea.list');
    }
}
