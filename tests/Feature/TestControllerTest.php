<?php

namespace Tests\Feature;

use Tests\TestCase;

class TestControllerTest extends TestCase
{
    public function test_response_view_has_passes_successfully(): void
    {
        $this->call('GET', '/')
            ->assertOk()
            ->assertViewIs('test')
            ->assertViewHas('name');
    }
}
