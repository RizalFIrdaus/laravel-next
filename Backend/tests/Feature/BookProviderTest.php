<?php

namespace Tests\Feature;

use App\Service\Books;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BookProviderTest extends TestCase
{
    private Books $books;
    public function testSingleton()
    {
        $this->books = $this->app->make(Books::class);
        $singleton = $this->app->make(Books::class);

        self::assertSame($this->books, $singleton);
    }
}
