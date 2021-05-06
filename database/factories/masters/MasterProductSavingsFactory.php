<?php

namespace Database\Factories\Masters;

use App\Models\Masters\MasterProductSavings;
use Illuminate\Database\Eloquent\Factories\Factory;

class MasterProductSavingsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MasterProductSavings::class;

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
