<?php

namespace Database\Factories\Masters;

use App\Models\Masters\MasterCities;
use Illuminate\Database\Eloquent\Factories\Factory;

class MasterCitiesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MasterCities::class;

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
