<?php

namespace Database\Factories\Masters;

use App\Models\Masters\MasterAreas;
use Illuminate\Database\Eloquent\Factories\Factory;

class MasterAreasFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MasterAreas::class;

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
