<?php

namespace App\Http\Controllers;

use App\Http\Requests\TurmaRequest;
use App\Services\TurmaService;
use Illuminate\Http\Request;

class TurmaController extends Controller
{
    public function __construct(public TurmaService $turmaService)
    {

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result = $this->turmaService->list();
        return response()->json($result, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TurmaRequest $request)
    {
        $result = $this->turmaService->store($request->all());
        return response()->json($result, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $result = $this->turmaService->findByPk($id);

        if ($result === null) {
            return response()->json(['Erro' => 'Recurso pesquisado não existe'], 404);
        }

        return response()->json($result, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TurmaRequest $request, string $id)
    {
        $turma = $this->turmaService->findByPk($id);

        if ($turma === null) {
            return response()->json(['Erro' => 'Impossível realizar a atualização. O recurso solicitado não existe'], 404);
        }

        $result = $this->turmaService->update($turma, $request->all());
        return response()->json($result, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $turma = $this->turmaService->findByPk($id);

        if ($turma === null) {
            return response()->json(['Erro' => 'Impossível remover o registro. O recurso solicitado não existe'], 404);
        }

        $this->turmaService->delete($turma);

        return response()->json(['msg' => 'Turma removida com sucesso!'], 200);
    }
}
