<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class livro extends Model
{
  use HasFactory;

  protected $fillable = [
    'user_id',
    'autor',
    'titulo',
    'subtitulo',
    'edicao',
    'editora',
    'ano_publicacao',
  ];

  public function user()
  {
    return $this->belongsTo(User::class);
  }
}
