<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CadernoEstudo extends Model
{
    protected $table = 'caderno_estudos';
    protected $fillable = ['nome', 'banca', 'data_prova', 'user_id'];

    public function disciplinas()
    {
        return $this->hasMany(Disciplina::class);
    }

    public function simulados()
{
    return $this->hasMany(Simulado::class);
}


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
