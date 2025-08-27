<?php

namespace Tests\Feature\Controllers\API;

use App\Models\Turma;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TurmaControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_turma_creation_successfully(): void
    {
        $data = [
            'codigo' => '101'
        ];

        $response = $this->postJson('/api/turma', $data);

        $this->assertEquals('101', $response->json()['codigo']);
        $response->assertStatus(201);
    }

    public function test_turma_creation_failed()
    {
        $data = [
            'codigo' => null
        ];

        $response = $this->postJson('/api/turma', $data);

        $response->assertStatus(422);
        $response->assertJsonStructure(['message', 'errors']);
    }

    public function test_turma_get_all_successfully()
    {
        Turma::factory()->create();

        $response = $this->getJson('/api/turma');

        $this->assertTrue(is_array(json_decode($response->getContent())));
        $response->assertStatus(200);
    }

    public function test_turma_get_by_pk_successfully()
    {
        $data = [
            'codigo' => '101'
        ];

        $turma = Turma::factory()->create($data);

        $response = $this->getJson('/api/turma/' . $turma->id);

        $this->assertEquals('101', $response->json()['codigo']);
        $response->assertStatus(200);
    }

    public function test_turma_by_pk_not_found()
    {
        $response = $this->getJson('/api/turma/1');

        $response->assertStatus(404);
        $response->assertJsonStructure(['Erro'])
            ->assertJson(['Erro' => "Recurso pesquisado não existe"]);
    }

    public function test_turma_update_successfully()
    {
        $turma = Turma::factory()->create();

        $data = [
            'codigo' => '101'
        ];

        $response = $this->patchJson('/api/turma/' . $turma->id, $data);

        $this->assertEquals('101', $response->json()['codigo']);
        $response->assertStatus(200);
    }

    public function test_turma_update_failed()
    {
        $turma = Turma::factory()->create();

        $data = [
            'codigo' => null
        ];

        $response = $this->patchJson('/api/turma/' . $turma->id, $data);

        $response->assertStatus(422);
        $response->assertJsonStructure(['message', 'errors']);
    }

    public function test_turma_update_failed_404()
    {
        $data = [
            'codigo' => '101'
        ];

        $response = $this->patchJson('/api/turma/1', $data);

        $response->assertStatus(404);
        $response->assertJsonStructure(['Erro'])
            ->assertJson(['Erro' => "Impossível realizar a atualização. O recurso solicitado não existe"]);
    }

    public function test_turma_delete_successfully()
    {
        $turma = Turma::factory()->create();

        $response = $this->deleteJson('/api/turma/' . $turma->id);

        $response->assertStatus(200);
        $response->assertJsonStructure(['msg'])
            ->assertJson(['msg' => "Turma removida com sucesso!"]);
    }

    public function test_turma_delete_failed()
    {
        $response = $this->deleteJson('/api/turma/1');

        $response->assertStatus(404);
        $response->assertJsonStructure(['Erro'])
            ->assertJson(['Erro' => "Impossível remover o registro. O recurso solicitado não existe"]);
    }
}
