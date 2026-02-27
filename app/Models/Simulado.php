<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Simulado extends Model
{
    protected $fillable = [
        'user_id',
        'caderno_estudo_id',
        'titulo',
        'observacoes',
        'total_questoes',
        'pontuacao'
    ];

    public function respostas()
    {
        return $this->hasMany(RespostaSimulado::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cadernoEstudo()
    {
        return $this->belongsTo(CadernoEstudo::class);
    }

    public function questoes()
    {
        return $this->belongsToMany(Questao::class, 'simulado_questao')
            ->withPivot('ordem')
            ->withTimestamps()
            ->orderBy('simulado_questao.ordem');
    }
}
