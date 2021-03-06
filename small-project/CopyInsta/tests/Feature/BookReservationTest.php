<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BookReservationTest extends TestCase
{    
    use RefreshDatabase;
    public function test_Book_Can_Added_Lib() {
        $this->withoutExceptionHandling();
        $response = $this->post('/book', [
            "title" => "Harry Pottter",
            "author" => "J.K"
        ]);
        $response->assertOK();
    }
}
