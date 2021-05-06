<?php

namespace Database\Factories\Masters;

use App\Models\Masters\MasterSubmissionValidationStatuses;
use Illuminate\Database\Eloquent\Factories\Factory;

class MasterSubmissionValidationStatusesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MasterSubmissionValidationStatuses::class;

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
