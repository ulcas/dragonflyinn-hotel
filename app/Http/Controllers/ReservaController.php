<?php
namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Repository\QuartoRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ReservaController extends Controller
{
    public function __construct(Reserva $reserva, QuartoRepository $quartoRepository)
    {
        $this->reserva = $reserva;
        $this->quartoRepository = $quartoRepository;
    }

    /** 
     * Display a listing of the resource.
     * 
     * @return Response
     */
    public function index()
    {
        $reserva = $this->reserva->all();
        return response()->json($reserva);
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate($this->reserva->rules(), $this->reserva->feedback());

        $reserva = $this->reserva->create([
            'nome' => $request->nome,
            'email' => $request->email,
            'quarto_id' => $request->quarto_id,
            'periodo_de' => $request->periodo_de,
            'periodo_ate' => $request->periodo_ate,
        ]);

        $this->quartoRepository->updateQuarto(
            $request->quarto_id,
             ['disponivel' => 0]
        );

        return response()->json($reserva, 201);
    }

    /**
     * Display the specified resource.
     * 
     * @param string $email
     * @return Response
     */
    public function show(string $email)
    {
        $reserva = $this->reserva->whereLike('email',"{$email}")->first();
        if (!isset($reserva)) {
            return response()->json(['error: Reserva não encontrada'], 404);
        }

        return response()->json($reserva, 200);
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
        $reserva = $this->reserva->find($id);

        if (!isset($reserva)) {
            return response()->json(
                ['Impossível realizar a atualização. O recurso solicitado não existe'],
                404
            );
        }

        if ($request->method() === 'PATCH') {
            $regrasDinamicas = array();
            foreach($reserva->rules() as $input => $regra) {
                if (array_key_exists($input, $request->all())) {
                    $regrasDinamicas[$input] = $regra;
                }
            }
            
            $request->validate($regrasDinamicas, $reserva->feedback());
        } else {
            $request->validate($reserva->rules(), $reserva->feedback());
        }

        $reserva->update($request->all());
        return $reserva;
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @param integer $id
     * @return Request
     */
    public function destroy(int $id)
    {
        $reserva = $this->reserva->find($id);

        if(!isset($reserva)) {
            return response()->json(
                ['erro' => 'Impossível realizar a exclusão. O recurso solicitado não existe'],
                404
            );
        }

        $quartoId = $reserva->quarto_id;
        $reserva->delete();

        $this->quartoRepository->updateQuarto(
            $quartoId,
            ['disponivel' => 1]
        );
        return response()->json(['msg' => 'Reserva removida com sucesso!'], 200);
    }
}
