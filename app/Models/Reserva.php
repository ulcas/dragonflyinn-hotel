<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $fillable = ['nome', 'email', 'quarto_id', 'periodo_de', 'periodo_ate'];
    
    public function rules() {
        return [
            'nome' => 'required|min:3',
            'email' => 'required|email|unique:reservas,email'.$this->id.'|min:3',
            'quarto_id' => 'required|unique:reservas,quarto_id'.$this->id.'',
        ];
    }
    
    public function feedback() {
        return [
            'required' => 'O campo :attribute é obrigatório',
            'nome.min' => 'O nome deve ter no mínimo 3 caracteres',
            'email.unique' => 'O e-mail já existe',
            'email.email' => 'O formato do e-mail está inválido',
            'quarto_id.unique' => 'O quarto está reservado!',
        ];
    }
}