<?php

namespace Database\Factories\Masters;

use App\Models\Masters\MasterApprovalLevels;
use Illuminate\Database\Eloquent\Factories\Factory;

class MasterApprovalLevelsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MasterApprovalLevels::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
        'approval_level_group_id' => $this->faker->word,
        'sequence' => $this->faker->randomDigitNotNull
        ];
    }
}
