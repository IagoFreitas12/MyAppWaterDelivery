<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrega extends Model
{
    public function itemDeEntregas()
    {
        return $this->hasMany(ItemDeEntrega::class);
    }

    public function entregador()
    {
        return $this->belongsTo(Entregadorr::class);
    }

    use HasFactory;
}
