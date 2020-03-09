<?php

namespace Tests\Browser;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class MyWebTest extends DuskTestCase
{
    use RefreshDatabase;

    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testAddNewsHidden()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertDontSee('Add News');
        });
    }

    public function testAddNewsShown()
    {
        $user = factory(User::class)->create([
            'is_admin' => true
        ]);

        $this->actingAs($user)->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertSee('Categories');
        });
    }
}
