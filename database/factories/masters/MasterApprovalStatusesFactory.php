<?php

namespace Database\Factories\Masters;

use App\Models\Masters\MasterApprovalStatuses;
use Illuminate\Database\Eloquent\Factories\Factory;

class MasterApprovalStatusesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MasterApprovalStatuses::class;

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
