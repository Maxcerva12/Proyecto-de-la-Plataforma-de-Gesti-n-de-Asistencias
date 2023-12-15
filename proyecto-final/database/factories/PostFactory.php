<?php

namespace Database\Factories;

/**
 * el factory tiene a la estrutura incial de datos falsos, y esto se aprovechara desde mi archivo semilla
 */
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\post>
 */
class PostFactory extends Factory
{
      public function definition()
    {
        return [
            'user_id'=> 1,
            
            'identi'=> $id = $this->faker->numerify(),
            'nombre'=>$this->faker->name(),
            'apellido'=>$this->faker->lastName(),
            'correo'=>$this->faker->email(),
            'celular'=>$this->faker->phoneNumber(),
            'materia'=>$this->faker->sentence(),
            'slug'=> Str::slug($id),
        ];
    }
}