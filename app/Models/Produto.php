<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = [
        'nome',
        'preco',
        'categoria_id'
    ];
    
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function estoque()
    {
        return $this->belongsTo(Estoque::class);
    }

    use HasFactory;
}
