<?php

namespace Database\Factories\Masters;

use App\Models\Masters\MasterProductSavingRules;
use Illuminate\Database\Eloquent\Factories\Factory;

class MasterProductSavingRulesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MasterProductSavingRules::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_saving_id' => $this->faker->word,
        'min_saving_amount' => $this->faker->word,
        'max_saving_amount' => $this->faker->word,
        'interest_rate' => $this->faker->word,
        'repayment_source_id' => $this->faker->word
        ];
    }
}
