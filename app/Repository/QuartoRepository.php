<?php

namespace App\Repository;

use App\Models\Quarto;
use Illuminate\Http\Request;

class QuartoRepository
{
    /**
     * Realiza um update na tabela 'quartos'
     * 
     * @param int $quartoId
     * @param array $data
     * @return void
     */
    public function updateQuarto(int $quartoId, array $data): void
    {
        Quarto::find($quartoId)->update($data);
    }
}
