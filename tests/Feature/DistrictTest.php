<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DistictTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test Distict.
     *
     * @return void
     */
    public function add()
    {
        $this->withoutExceptionHandling();
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
