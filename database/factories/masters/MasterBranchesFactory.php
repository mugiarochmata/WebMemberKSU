<?php

namespace Database\Factories\Masters;

use App\Models\Masters\MasterBranches;
use Illuminate\Database\Eloquent\Factories\Factory;

class MasterBranchesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MasterBranches::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'company_id' => $this->faker->word,
        'name' => $this->faker->word,
        'address' => $this->faker->word,
        'phone_number' => $this->faker->word,
        'fax_number' => $this->faker->word,
        'city' => $this->faker->word,
        'province' => $this->faker->word
        ];
    }
}
