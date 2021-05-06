<?php

namespace Database\Factories\Masters;

use App\Models\Masters\MasterReligions;
use Illuminate\Database\Eloquent\Factories\Factory;

class MasterReligionsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MasterReligions::class;

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
