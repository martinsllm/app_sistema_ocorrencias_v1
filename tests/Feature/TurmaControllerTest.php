<?php

namespace Tests\Feature;

use App\Models\Turma;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TurmaControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_turma_was_created_successfully(): void
    {
        $data = [
            'codigo' => '101'
        ];

        $this->assertIsString($data['codigo'], 'O campo código deve ser do tipo string');
        $this->assertLessThan(5, strlen($data['codigo']), 'O campo código deve ter no máximo 4 caracteres');

        $response = $this->postJson('/api/turma', $data);

        $this->assertEquals('101', $response->json()['codigo']);
        $response->assertStatus(201);
    }

    public function test_turma_get_all_sucessfully()
    {
        Turma::factory()->create();

        $response = $this->getJson('/api/turma');

        $this->assertTrue(is_array(json_decode($response->getContent())));
        $response->assertStatus(200);
    }

    public function test_turma_get_by_pk_sucessfully()
    {
        $data = [
            'codigo' => '101'
        ];

        $turma = Turma::factory()->create($data);

        $response = $this->getJson('/api/turma/' . $turma->id);

        $this->assertEquals('101', $response->json()['codigo']);
        $response->assertStatus(200);
    }

    public function test_turma_update_sucessfully()
    {
        $turma = Turma::factory()->create();

        $data = [
            'codigo' => '101'
        ];

        $response = $this->patchJson('/api/turma/' . $turma->id, $data);

        $this->assertEquals('101', $response->json()['codigo']);
        $response->assertStatus(200);
    }
}
