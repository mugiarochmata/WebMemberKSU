<?php

namespace Database\Factories\Masters;

use App\Models\Masters\MasterNationalities;
use Illuminate\Database\Eloquent\Factories\Factory;

class MasterNationalitiesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MasterNationalities::class;

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
