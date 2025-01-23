<?php

namespace App\Repository;

use App\Models\Quarto;
use Illuminate\Http\Request;

class QuartoRepository
{
    public function updateQuarto(int $quartoId, array $data)
    {
        Quarto::find($quartoId)->update($data);
    }
}
