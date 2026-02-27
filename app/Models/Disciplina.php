<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    protected $fillable = [
        'name',
        'caderno_estudo_id'
    ];

    public function getNomeAttribute(): ?string
    {
        return $this->attributes['name'] ?? null;
    }

    public function setNomeAttribute(string $value): void
    {
        $this->attributes['name'] = $value;
    }

    public function questoes()
    {
        return $this->hasMany(Questao::class);
    }

    public function cadernoEstudos()
    {
        return $this->belongsTo(CadernoEstudo::class);
    }
}
