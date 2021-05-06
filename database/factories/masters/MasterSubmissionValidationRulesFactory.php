<?php

namespace Database\Factories\Masters;

use App\Models\Masters\MasterSubmissionValidationRules;
use Illuminate\Database\Eloquent\Factories\Factory;

class MasterSubmissionValidationRulesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MasterSubmissionValidationRules::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'submission_kind_group_id' => $this->faker->word,
        'submission_validation_parameter_id' => $this->faker->word,
        'valid_value' => $this->faker->word,
        'is_active' => $this->faker->randomDigitNotNull
        ];
    }
}
