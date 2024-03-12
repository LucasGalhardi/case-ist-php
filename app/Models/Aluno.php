<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aluno extends Model
{
    protected $fillable = ['nome', 'sobrenome', 'email', 'turma_id', 'imagem'];
    use SoftDeletes;
    use HasFactory;

    public function turma()
    {
        return $this->belongsTo(Turma::class);
    }

}
