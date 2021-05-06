<?php

namespace Database\Factories\Masters;

use App\Models\Masters\MasterCheckerStatuses;
use Illuminate\Database\Eloquent\Factories\Factory;

class MasterCheckerStatusesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MasterCheckerStatuses::class;

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
