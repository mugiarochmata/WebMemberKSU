<?php

namespace Database\Factories\Masters;

use App\Models\Masters\MasterSocmeds;
use Illuminate\Database\Eloquent\Factories\Factory;

class MasterSocmedsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MasterSocmeds::class;

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
