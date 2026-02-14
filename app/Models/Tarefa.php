<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'is_completed',
        'name',
        'user_id',
        'expiration_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
