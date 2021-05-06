<?php

namespace Database\Factories\Masters;

use App\Models\Masters\MasterRepaymentSources;
use Illuminate\Database\Eloquent\Factories\Factory;

class MasterRepaymentSourcesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MasterRepaymentSources::class;

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
