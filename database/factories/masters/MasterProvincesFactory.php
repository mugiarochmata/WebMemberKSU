<?php

namespace Database\Factories\Masters;

use App\Models\Masters\MasterProvinces;
use Illuminate\Database\Eloquent\Factories\Factory;

class MasterProvincesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MasterProvinces::class;

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
