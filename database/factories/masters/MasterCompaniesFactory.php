<?php

namespace Database\Factories\Masters;

use App\Models\Masters\MasterCompanies;
use Illuminate\Database\Eloquent\Factories\Factory;

class MasterCompaniesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MasterCompanies::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
        'economic_sector_id' => $this->faker->word
        ];
    }
}
