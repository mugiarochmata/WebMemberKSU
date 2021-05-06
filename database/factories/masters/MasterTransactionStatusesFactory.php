<?php

namespace Database\Factories\Masters;

use App\Models\Masters\MasterTransactionStatuses;
use Illuminate\Database\Eloquent\Factories\Factory;

class MasterTransactionStatusesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MasterTransactionStatuses::class;

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
