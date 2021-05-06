<?php

namespace Database\Factories\Masters;

use App\Models\Masters\MasterMemberSequences;
use Illuminate\Database\Eloquent\Factories\Factory;

class MasterMemberSequencesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MasterMemberSequences::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'seq' => $this->faker->randomDigitNotNull
        ];
    }
}
