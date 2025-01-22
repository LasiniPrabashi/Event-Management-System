<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

class EventFactory extends Factory
{
    /**
     * The name of the model that is being factory-generated.
     *
     * @var string
     */
    protected $model = Event::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'user_id' => $this->faker->name,
            'event_name' => $this->faker->sentence(3),
            'location' => $this->faker->address,
            'start_date' => $this->faker->dateTimeBetween('now', '+1 month'),
            'end_date' => $this->faker->dateTimeBetween('+1 month', '+2 months'),
            'start_time' => $this->faker->time(),
            'description' => $this->faker->paragraph,
            'is_active' => $this->faker->boolean,

        ];
    }
}
