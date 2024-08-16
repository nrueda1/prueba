<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    // La tabla asociada al modelo
    protected $table = 'tasks';

    // Los atributos que se pueden asignar en masa
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'due_date',
        'completed',
    ];

    // Definir la relación con el modelo User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

