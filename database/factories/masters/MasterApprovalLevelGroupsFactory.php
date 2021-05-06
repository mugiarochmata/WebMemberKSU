<?php

namespace Database\Factories\Masters;

use App\Models\Masters\MasterApprovalLevelGroups;
use Illuminate\Database\Eloquent\Factories\Factory;

class MasterApprovalLevelGroupsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MasterApprovalLevelGroups::class;

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
