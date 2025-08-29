<?php

namespace Tests\Feature\Controllers\API;

use App\Models\Estudante;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EstudanteControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_estudantes_get_all_successfully()
    {
        Estudante::factory()->create();

        $response = $this->getJson('/api/estudante');

        $this->assertTrue(is_array(json_decode($response->getContent())));
        $response->assertStatus(200);
    }
}
