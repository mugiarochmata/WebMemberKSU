<?php

namespace Database\Factories\Masters;

use App\Models\Masters\MasterTransactionCategories;
use Illuminate\Database\Eloquent\Factories\Factory;

class MasterTransactionCategoriesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MasterTransactionCategories::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
        'transaction_category_group_id' => $this->faker->word
        ];
    }
}
