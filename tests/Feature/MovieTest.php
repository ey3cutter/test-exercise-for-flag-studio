<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Movie;
use App\Models\Genre;
use App\Models\Actor;
use Tests\TestCase;

class MovieTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_get_a_list_of_movies() {
        $genre = Genre::factory()->create();
        $actor = Actor::factory()->create();

        $movie = Movie::factory()->create(['genre_id' => $genre->id]);
        $movie->actors()->attach($actor->id);

        $response = $this->getJson('/api/admin/movies');

        $response->assertStatus(200)
            ->assertJson([
                ['title' => $movie->title]
            ]);
    }

    /** @test */
    public function it_can_filter_movies_by_genre()
    {
        $genre1 = Genre::factory()->create();
        $genre2 = Genre::factory()->create();
        $movie1 = Movie::factory()->create(['genre_id' => $genre1->id]);
        $movie2 = Movie::factory()->create(['genre_id' => $genre2->id]);

        $response = $this->getJson('/api/admin/movies?genre_id=' . $genre1->id);

        $response->assertStatus(200)
            ->assertJson([
                ['title' => $movie1->title]
            ])
            ->assertJsonMissing([
                ['title' => $movie2->title]
            ]);
    }

    /** @test */
    public function it_can_filter_movies_by_actor()
    {
        $actor1 = Actor::factory()->create();
        $actor2 = Actor::factory()->create();
        $movie1 = Movie::factory()->create();
        $movie2 = Movie::factory()->create();

        $movie1->actors()->attach($actor1->id);
        $movie2->actors()->attach($actor2->id);

        $response = $this->getJson('/api/admin/movies?actor_id=' . $actor1->id);

        $response->assertStatus(200)
            ->assertJson([
                ['title' => $movie1->title]
            ])
            ->assertJsonMissing([
                ['title' => $movie2->title]
            ]);
    }

    /** @test */
    public function it_can_create_a_movie()
    {
        $genre = Genre::factory()->create();
        $actor = Actor::factory()->create();
        $movieData = [
            'title' => 'Test Movie',
            'genre_id' => $genre->id,
            'actors' => [$actor->id]
        ];

        $response = $this->postJson('/api/admin/movies', $movieData);

        $response->assertStatus(201)
            ->assertJson([
                'title' => 'Test Movie',
                'genre_id' => $genre->id
            ]);

        $this->assertDatabaseHas('movies', ['title' => 'Test Movie']);
        $this->assertDatabaseHas('actor_movie', ['actor_id' => $actor->id]);
    }

    /** @test */
    public function it_can_delete_a_movie()
    {
        $movie = Movie::factory()->create();

        $response = $this->deleteJson('/api/admin/movies/' . $movie->id);

        $response->assertStatus(204);
        $this->assertDatabaseMissing('movies', ['id' => $movie->id]);
    }
}
