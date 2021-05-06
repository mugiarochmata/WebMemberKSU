<?php

namespace Database\Factories\Masters;

use App\Models\Masters\MasterCountries;
use Illuminate\Database\Eloquent\Factories\Factory;

class MasterCountriesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MasterCountries::class;

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
