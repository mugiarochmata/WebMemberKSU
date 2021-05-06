<?php

namespace Database\Factories\Masters;

use App\Models\Masters\MasterTransactionCategoryGroups;
use Illuminate\Database\Eloquent\Factories\Factory;

class MasterTransactionCategoryGroupsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MasterTransactionCategoryGroups::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
        'employee_group_id' => $this->faker->word
        ];
    }
}
