<?php

namespace Database\Factories\Masters;

use App\Models\Masters\MasterProductLoans;
use Illuminate\Database\Eloquent\Factories\Factory;

class MasterProductLoansFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MasterProductLoans::class;

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
