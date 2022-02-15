<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class NavigacioTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testFooldalElsoOldal()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Első');
        });
    }

    public function testElsorolMasodikraTovabb()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Első')
                    ->clickLink('Tovább')
                    ->assertPathIs('/masodik')
                    ->assertSee('Második');
        });
    }

    public function testMasodikrolElsoreVissza()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/masodik')
                    ->assertSee('Második')
                    ->clickLink('Vissza')
                    ->assertPathIs('/elso')
                    ->assertSee('Első');
        });
    }
}
