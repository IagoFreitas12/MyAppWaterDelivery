<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entregador extends Model
{
    public function entregas()
    {
        return $this->hasMany(Entrega::class);
    }

    use HasFactory;
}
