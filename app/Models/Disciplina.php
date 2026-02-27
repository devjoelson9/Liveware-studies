<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    protected $fillable = [
        'nome',
        'caderno_estudo_id'
    ];
    
    public function questoes()
    {
        return $this->hasMany(Questao::class);
    }

    public function cadernoEstudos()
    {
        return $this->belongsTo(CadernoEstudo::class);
    }
}
