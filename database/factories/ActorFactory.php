<?php

namespace Database\Factories;

use App\Models\Actor;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class ActorFactory extends Factory
{
    protected $model = Actor::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
        ];
    }
}
