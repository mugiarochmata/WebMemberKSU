<?php

namespace Database\Factories\Masters;

use App\Models\Masters\MasterCurrencies;
use Illuminate\Database\Eloquent\Factories\Factory;

class MasterCurrenciesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MasterCurrencies::class;

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
