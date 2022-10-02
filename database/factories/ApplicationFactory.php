<?php

namespace Database\Factories;

use App\Models\Appartment;
use Illuminate\Database\Eloquent\Factories\Factory;

class ApplicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'full_name'=>$this->faker->unique()->name(),
            'phone_number'=>$this->faker->unique()->numerify('+#(###)###-####'),
            'client_comment'=>$this->faker->unique()->realText(254),
            'appartment_id'=>$this->faker->randomElement(Appartment::select('id')->get()->flatten())
        ];
    }
}
