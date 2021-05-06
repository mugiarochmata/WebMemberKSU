<?php

namespace Database\Factories\Masters;

use App\Models\Masters\MasterApprovalCategories;
use Illuminate\Database\Eloquent\Factories\Factory;

class MasterApprovalCategoriesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MasterApprovalCategories::class;

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
