<?php

namespace Database\Factories;

class Product
{
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'description' => fake()->description,
            'prise'=>fake()->prise,


        ];
    }

}
