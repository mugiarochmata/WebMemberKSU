<?php

namespace Database\Factories\Masters;

use App\Models\Masters\MasterLengthOfStays;
use Illuminate\Database\Eloquent\Factories\Factory;

class MasterLengthOfStaysFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MasterLengthOfStays::class;

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
