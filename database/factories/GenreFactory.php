<?php

namespace Database\Factories;

use App\Models\Genre;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class GenreFactory extends Factory
{
    protected $model = Genre::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
        ];
    }
}
