<?php

namespace Cachorios\CrudLar\Tests\Units;
use Cachorios\CrudLar\Facades\CurdLar;
use Cachorios\CrudLar\Tests\TestCase;


class HelloTest extends TestCase
{

    /** @test */
    public function it_can_say_hello()
    {

        $this->assertEquals(
            'Hola... Luis',
            $this->app->make('crud-lar')->say('Luis'));

        $this->assertEquals(
            'Hola... Luis',
            CurdLar::say('Luis'));
    }

}