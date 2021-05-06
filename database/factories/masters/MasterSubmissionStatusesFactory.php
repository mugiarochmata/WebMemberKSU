<?php

namespace Database\Factories\Masters;

use App\Models\Masters\MasterSubmissionStatuses;
use Illuminate\Database\Eloquent\Factories\Factory;

class MasterSubmissionStatusesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MasterSubmissionStatuses::class;

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
