<?php

namespace Tests\Feature;

use App\Services\TurmaService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TurmaControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_turma_was_created_successfully(): void
    {
        $data = [
            'codigo' => '101'
        ];

        $this->assertIsString($data['codigo']);
        $this->assertLessThan(5, strlen($data['codigo']));

        $response = $this->postJson('/api/turma', $data);

        $this->assertEquals('101', $response->json()['codigo']);
        $response->assertStatus(201);
    }
}
