<?php

namespace Database\Factories;

use App\Models\Genre;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Movie;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class MovieFactory extends Factory
{
    protected $model = Movie::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'genre_id' => Genre::factory(),
        ];
    }
}
