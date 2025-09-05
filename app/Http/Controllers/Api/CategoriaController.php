<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use  App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Categoria::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dadosValidados = $request->validate([
            'nome' => 'required|string|max:255',
            'telefone' => 'nullable|string',
        ]);

        $categoria = Categoria::create($dadosValidados);

        return response()->json($categoria, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria)
    {
        return $categoria;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categoria $categoria)
    {
        $dadosValidados = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
        ]);

        $categoria->update($dadosValidados);

        return response()->json($categoria);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categoria)
    {
        $categoria->delete();

        return response()->json(null, 204);
    }
}
