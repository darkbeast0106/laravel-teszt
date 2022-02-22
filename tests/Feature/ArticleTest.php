<?php

namespace Tests\Feature;

use App\Models\Article;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ArticleTest extends TestCase
{
    use RefreshDatabase;

    public function test_seed_count()
    {
        $this->seed();
        $this->assertDatabaseCount('articles', 30);
    }

    public function test_model_exists()
    {
        $article = Article::factory()->create();
        $this->assertModelExists($article);
    }

    public function test_most_viewed()
    {
        Article::factory(5)->create();
        $mostViewed = Article::factory()->create(['views' => 200]);
        Article::factory()->create(['views' => 100]);
        $expectedID = $mostViewed->id;
        $articles = Article::mostViewed();
        $mostViewedID = $articles->first()->id;
        $this->assertEquals($mostViewed->id, $articles->first()->id);
    }
}
