<?php

namespace Database\Factories\Masters;

use App\Models\Masters\MasterInsuranceRates;
use Illuminate\Database\Eloquent\Factories\Factory;

class MasterInsuranceRatesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MasterInsuranceRates::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'age' => $this->faker->randomDigitNotNull,
        'jw' => $this->faker->randomDigitNotNull,
        'rate' => $this->faker->word
        ];
    }
}
