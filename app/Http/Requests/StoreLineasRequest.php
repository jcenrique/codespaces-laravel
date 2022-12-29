<?php

namespace App\Http\Requests;

use App\Models\Linea;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\Rule;

class StoreLineasRequest extends FormRequest
{


    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {

        return [
            'linea.name' => [
                'min:5',
                'required',
                Rule::unique(Linea::class, 'name')->ignore(Linea::find($this->linea['id'])),
            ]
        ];
    }

    public function messages()
    {
        return [
            'linea.name.min' => 'El numero de caracteres no puede ser inferior a 5',
            'linea.name.required' => 'El nombre no puede estar vació',
            'linea.name.unique' => 'No se puede repetir el nombre de la línea'
        ];
    }
}
