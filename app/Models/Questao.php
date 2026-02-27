<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Questao extends Model
{
    protected $table = 'questoes';

    protected $fillable = [
        'disciplina_id',
        'enunciado',
        'alternativa_a',
        'alternativa_b',
        'alternativa_c',
        'alternativa_d',
        'alternativa_e',
        'alternativa_correta',
    ];

    public function disciplina()
    {
        return $this->belongsTo(Disciplina::class);
    }
}
