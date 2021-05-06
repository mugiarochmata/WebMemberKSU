<?php

namespace Database\Factories\Masters;

use App\Models\Masters\MasterGenders;
use Illuminate\Database\Eloquent\Factories\Factory;

class MasterGendersFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MasterGenders::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word
        ];
    }
}
