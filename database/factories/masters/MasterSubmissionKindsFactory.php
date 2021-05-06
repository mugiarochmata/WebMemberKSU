<?php

namespace Database\Factories\Masters;

use App\Models\Masters\MasterSubmissionKinds;
use Illuminate\Database\Eloquent\Factories\Factory;

class MasterSubmissionKindsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MasterSubmissionKinds::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
        'submission_kind_group_id' => $this->faker->word
        ];
    }
}
