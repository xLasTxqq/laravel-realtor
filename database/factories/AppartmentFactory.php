<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AppartmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'house_number'=>$this->faker->unique()->secondaryAddress(),
            'floor'=>$this->faker->numberBetween(-1,200),
            'appartment_number'=>$this->faker->numberBetween(0,1000),
            'number_of_rooms'=>$this->faker->numberBetween(1,10),
            'apartment_area'=>$this->faker->numberBetween(5,500),
            'living_space'=>$this->faker->numberBetween(5,500),
            'price'=>$this->faker->numberBetween(1000,1000000),
            'currency'=>'$'
        ];
    }
}
