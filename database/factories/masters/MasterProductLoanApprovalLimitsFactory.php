<?php

namespace Database\Factories\Masters;

use App\Models\Masters\MasterProductLoanApprovalLimits;
use Illuminate\Database\Eloquent\Factories\Factory;

class MasterProductLoanApprovalLimitsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MasterProductLoanApprovalLimits::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'approval_level_id' => $this->faker->word,
        'product_id' => $this->faker->word,
        'product_kind_id' => $this->faker->word,
        'low_limit_amount' => $this->faker->word,
        'high_limit_amount' => $this->faker->word,
        'maximum_amount' => $this->faker->word,
        'sequence' => $this->faker->randomDigitNotNull
        ];
    }
}
