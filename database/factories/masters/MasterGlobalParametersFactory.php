<?php

namespace Database\Factories\Masters;

use App\Models\Masters\MasterGlobalParameters;
use Illuminate\Database\Eloquent\Factories\Factory;

class MasterGlobalParametersFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MasterGlobalParameters::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'param_name' => $this->faker->word,
        'param_value' => $this->faker->word
        ];
    }
}
