<?php

namespace Database\Factories\Masters;

use App\Models\Masters\MasterProductLoanRules;
use Illuminate\Database\Eloquent\Factories\Factory;

class MasterProductLoanRulesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MasterProductLoanRules::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id' => $this->faker->word,
        'product_loan_kind_id' => $this->faker->word,
        'min_plafond' => $this->faker->word,
        'max_plafond' => $this->faker->word,
        'min_tenor' => $this->faker->randomDigitNotNull,
        'max_tenor' => $this->faker->randomDigitNotNull,
        'interest_rate' => $this->faker->word,
        'provision_fee' => $this->faker->word,
        'provision_fee_unit_id' => $this->faker->word,
        'administration_fee' => $this->faker->word,
        'administration_fee_unit_id' => $this->faker->word,
        'loan_processing_type_id' => $this->faker->word,
        'interest_type_id' => $this->faker->word,
        'is_extendable' => $this->faker->word,
        'extendable_after' => $this->faker->randomDigitNotNull,
        'is_active' => $this->faker->randomDigitNotNull
        ];
    }
}
