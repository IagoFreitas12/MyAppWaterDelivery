<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    public function produto()
    {
        return $this->belongsTo(Categoria::class);
    }

    use HasFactory;
}