<?php

namespace Database\Factories\Masters;

use App\Models\Masters\MasterOccupations;
use Illuminate\Database\Eloquent\Factories\Factory;

class MasterOccupationsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MasterOccupations::class;

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
