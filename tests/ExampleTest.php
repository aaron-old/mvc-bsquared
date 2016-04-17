<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     * @throws \InvalidArgumentException
     */
    public function testBasicExample()
    {
        // 1. Visit the home page. 
        $this->visit('/')
            ->click('Click Me')
            ->seePageIs('/');
    }
}
