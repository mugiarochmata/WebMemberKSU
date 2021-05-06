<?php

namespace Database\Factories\Masters;

use App\Models\Masters\MasterMemberPositions;
use Illuminate\Database\Eloquent\Factories\Factory;

class MasterMemberPositionsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MasterMemberPositions::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
        'approval_level_id' => $this->faker->word,
        'update_date' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
