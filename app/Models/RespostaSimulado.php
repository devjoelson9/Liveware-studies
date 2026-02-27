<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RespostaSimulado extends Model
{
    protected $table = 'respostas_simulado';

    protected $fillable = [
        'simulado_id',
        'questao_id',
        'alternativa_marcada',
        'correta'
    ];

    public function simulado()
    {
        return $this->belongsTo(Simulado::class);
    }

    public function questao()
    {
        return $this->belongsTo(Questao::class);
    }
}
