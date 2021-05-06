<?php

namespace Database\Factories\Masters;

use App\Models\Masters\MasterEmployeeStatuses;
use Illuminate\Database\Eloquent\Factories\Factory;

class MasterEmployeeStatusesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MasterEmployeeStatuses::class;

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
