<?php

namespace Database\Factories\Masters;

use App\Models\Masters\MasterNotificationStatuses;
use Illuminate\Database\Eloquent\Factories\Factory;

class MasterNotificationStatusesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MasterNotificationStatuses::class;

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
