<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MyTest extends TestCase
{
    use RefreshDatabase;

    public function testBasicTest()
    {
        $this->assertTrue(true);
    }

    public function testOpenIndexReturn200()
    {
        $response = $this->get(route('index'));

        $response->assertStatus(200);
    }

    public function testOpenCategoriesReturn200()
    {
        $response = $this->get(route('categories'));

        $response->assertStatus(200);
    }

    public function testOpenGetByCategoryReturn200()
    {
        $response = $this->get(route('news.getByCategory', ['category_id' => 0]));

        $response->assertStatus(200);
    }

    public function testOpenGetByCategoryReturnNoCategory()
    {
        $response = $this->get(route('news.getByCategory', ['category_id' => 111111]));

        $response->assertStatus(302);
        $response->assertLocation(route('categories'));
    }

    public function testOpenNewsReturn200()
    {
        $response = $this->get(route('news.one', ['id' => 0]));

        $response->assertStatus(200);
    }

    public function testOpenNewsReturnNoItem()
    {
        $response = $this->get(route('news.one', ['id' => 111111]));

        $response->assertStatus(302);
        $response->assertLocation(route('categories'));
    }

    public function testOpenAboutReturn200()
    {
        $response = $this->get(route('about'));

        $response->assertStatus(200);
    }

    public function testApplicationAddNewsAvailable()
    {
        $user = factory(User::class)->create([
            'is_admin' => true
        ]);

        $response = $this->actingAs($user)
            ->get('/');
        $response->assertStatus(200);
        $response->assertSeeText('Add News');
    }

    public function testApplicationAddNewsNotAvailable()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->get('/');
        $response->assertStatus(200);
        $response->assertDontSeeText('Add News');
    }

    public function testApplicationAddNewsNotAvailableGuest()
    {
        $user = factory(User::class)->create();

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertDontSeeText('Add News');
    }
}
