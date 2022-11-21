<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    public function enderecos()
    {
        return $this->hasMany(Endereco::class);
    }

    public function pedidos()
    {
        return $this->hasMany(Pedido::class);
    }

    use HasFactory;
}
