<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\TodoList;

class TodoListFactory extends Factory
{

    /**
     * Define of the factory's corresponding model.
     *
     * @var  string
     */
     protected $model = TodoList::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
           'name'=>$this->faker->sentence
        ];
    }
}
