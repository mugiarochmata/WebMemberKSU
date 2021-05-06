<?php

namespace Database\Factories\Masters;

use App\Models\Masters\MasterSubmissionValidationParameters;
use Illuminate\Database\Eloquent\Factories\Factory;

class MasterSubmissionValidationParametersFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MasterSubmissionValidationParameters::class;

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
