<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoutingTest extends TestCase
{
    public function test_a_fooldal_az_elso_oldal()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('Első');
        $response->assertDontSee('Második');
        $response->assertDontSee('Harmadik');
    }

    public function test_elso_oldal_az_elso_linkel_elerheto()
    {
        $response = $this->get('/elso');
        $response->assertStatus(200);
        $response->assertSee('Első');
        $response->assertDontSee('Második');
        $response->assertDontSee('Harmadik');
    }

    public function test_masodik_utvonal_masodik_oldalra_mutat()
    {
        $response = $this->get('/masodik');
        $response->assertStatus(200);
        $response->assertDontSee('Első');
        $response->assertSee('Második');
        $response->assertDontSee('Harmadik');
    }
    public function test_harmadik_utvonal_harmadik_oldalra_mutat()
    {
        $response = $this->get('/harmadik');
        $response->assertStatus(200);
        $response->assertDontSee('Első');
        $response->assertDontSee('Második');
        $response->assertSee('Harmadik');
    }
}
