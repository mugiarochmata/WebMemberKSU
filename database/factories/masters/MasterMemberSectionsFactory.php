<?php

namespace Database\Factories\Masters;

use App\Models\Masters\MasterMemberSections;
use Illuminate\Database\Eloquent\Factories\Factory;

class MasterMemberSectionsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MasterMemberSections::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
        'member_group_id' => $this->faker->word
        ];
    }
}
