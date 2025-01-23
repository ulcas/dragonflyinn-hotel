<?php

namespace App\Http\Controllers;

use App\Models\Quarto;
use Illuminate\Http\Request;


use function PHPUnit\Framework\isNull;

class QuartoController extends Controller
{
    public function __construct(Quarto $quarto)
    {
        $this->quarto = $quarto;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quartos = $this->quarto->all();
        return response()->json($quartos);
    }

    /**
     * @param Integer $id
     * @return Illuminate\Http\Response
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $quarto = $this->quarto->find($id);

        if (!isset($quarto)) {
            return response()->json(['error: Quarto não encontrado'], 404);
        }
        return response()->json($quarto);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $quarto = $this->quarto->find($id);

        if (!isset($quarto)) {
            return response()->json(['Impossível realizar a atualização. O recurso solicitado não existe'], 404);
        }
        
        $updateDisponibilidade = ['disponivel' => $request->disponivel];
        $quarto->update($updateDisponibilidade);

        return $quarto;
    }
}
