<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DistribuidoraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validar os dados recebidos
        $dadosValidados = $request->validate([
            'nome' => 'required|string|max:255',
            'preco' => 'required|numeric|min:0',
            'quantidade' => 'required|integer|min:0',
            'categoria_id' => 'required|exists:categorias,id', // Verifica se a categoria existe
            'distribuidora_id' => 'required|exists:distribuidoras,id', // Verifica se a distribuidora existe
        ]);

        // 2. Adicionar o ID do usuário autenticado
        //    Isso preenche a coluna 'created_by' que definimos na migration
        $dadosValidados['created_by'] = auth()->id();

        // 3. Criar o produto
        $produto = Produto::create($dadosValidados);

        // 4. Retornar o produto recém-criado com o status HTTP 201 (Created)
        return response()->json($produto, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
