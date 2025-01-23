<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuartoSeeder extends Seeder
{
    static $quartos = [
        [
            'descricao' => 'Quarto de Solteiro',
            'capacidade' => 1
        ],
        [
            'descricao' => 'Quarto de Casal',
            'capacidade' => 2
        ],
        [
            'descricao' => 'Quarto Duplo',
            'capacidade' => 3
        ]
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (self::$quartos as $quarto) {
            DB::table('quartos')->insert([
                'descricao' => $quarto['descricao'],
                'capacidade' => $quarto['capacidade'],
                'disponivel' => true
            ]);
        }
    }
}
