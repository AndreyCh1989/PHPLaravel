<?php

namespace Tests\Browser;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class MyWebTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function setUp(): void {
        parent::setUp();

        $this->user = factory(User::class)->create([
            'is_admin' => true
        ]);
    }

    public function testAddNewsHidden()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertDontSee('Add News');
        });
    }

    public function testAddNewsShown()
    {
        $user = $this->user;
        $this->browse(function (Browser $browser) use ($user) {
            $browser
                ->loginAs($user)
                ->visit('/')
                ->assertSee('Add News');
        });
    }

    public function testTitleRequired()
    {
        $user = $this->user;
        $this->browse(function (Browser $browser) use ($user) {
            $browser
                ->loginAs($user)
                ->visit('/news/create')
                ->press('Submit')
                ->assertSee('The Title field is required.')
                ->logout();
        });
    }

    public function testTextRequired()
    {
        $user = $this->user;
        $this->browse(function (Browser $browser) use ($user) {
            $browser
                ->loginAs($user)
                ->visit('/news/create')
                ->press('Submit')
                ->assertSee('The Text field is required.')
                ->logout();
        });
    }

    public function testTextMinimum()
    {
        $user = $this->user;
        $this->browse(function (Browser $browser) use ($user) {
            $browser
                ->loginAs($user)
                ->visit('/news/create')
                ->type('text', 'foo')
                ->press('Submit')
                ->assertSee('The Text must be at least 10 characters.')
                ->logout();
        });
    }
}
