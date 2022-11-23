<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = [
        "rotulo"
    ];
    
    public function produtos()
    {
        return $this->hasMany(Produto::class);
    }

    use HasFactory;
}
