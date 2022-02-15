<?php

namespace Tests\Unit;

use App\Sor;
use PHPUnit\Framework\TestCase;

class SorTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_sor_ures_letrehozaskor()
    {
        $sor = new Sor();
        $this->assertNull($sor->kivesz());
    }

    public function test_elem_hozzadhato()
    {
        $sor = new Sor();
        $this->assertFalse($sor->benneVan('sajt'));
        $sor->hozzaad('sajt');
        $this->assertTrue($sor->benneVan('sajt'));
    }

    public function test_elem_kiveheto()
    {
        $sor = new Sor(['sajt']);
        $this->assertTrue($sor->benneVan('sajt'));
        $this->assertEquals('sajt', $sor->kivesz());
        $this->assertFalse($sor->benneVan('sajt'));
    }
}
