<?php

namespace Database\Factories;

use App\Models\Punto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PuntoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
protected $model = Punto::class;

    public function definition()
    {
        return [
            //
        ];
    }
}
