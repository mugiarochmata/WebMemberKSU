<?php

namespace Database\Factories\Masters;

use App\Models\Masters\MasterMaritalStatuses;
use Illuminate\Database\Eloquent\Factories\Factory;

class MasterMaritalStatusesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MasterMaritalStatuses::class;

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
