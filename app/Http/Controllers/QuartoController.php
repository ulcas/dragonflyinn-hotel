<?php

namespace App\Http\Controllers;

use App\Models\Quarto;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class QuartoController extends Controller
{
    public function __construct(Quarto $quarto)
    {
        $this->quarto = $quarto;
    }

    /** 
     * Display a listing of the resource.
     * 
     * @return Response
     */
    public function index()
    {
        $quartos = $this->quarto->where('disponivel', '=', 1)->get();
        return response()->json($quartos);
    }

    /**
     * Display the specified resource.
     * 
     * @param integer $id
     * @return Response
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
     * 
     * @param Request $request
     * @param integer $id
     * @return Response
     */
    public function update(Request $request, int $id)
    {
        $quarto = $this->quarto->find($id);

        if (!isset($quarto)) {
            return response()->json(
                ['Impossível realizar a atualização. O recurso solicitado não existe'],
                404
            );
        }
        
        $updateDisponibilidade = ['disponivel' => $request->disponivel];
        $quarto->update($updateDisponibilidade);

        return $quarto;
    }
}
