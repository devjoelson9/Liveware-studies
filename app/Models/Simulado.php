<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Simulado extends Model
{
    protected $fillable = [
        'user_id',
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
}
