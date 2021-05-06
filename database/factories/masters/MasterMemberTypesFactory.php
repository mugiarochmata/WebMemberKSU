<?php

namespace Database\Factories\Masters;

use App\Models\Masters\MasterMemberTypes;
use Illuminate\Database\Eloquent\Factories\Factory;

class MasterMemberTypesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MasterMemberTypes::class;

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
