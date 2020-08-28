<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test Contact.
     *
     * @return void
     */
    public function HomePage()
    {
        $this->withoutExceptionHandling();
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function inputForm()
    {
        $this->withoutExceptionHandling();
        $response = $this->get('/');

        $response->assertStatus(200);    
    }
}
