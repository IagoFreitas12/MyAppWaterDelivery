<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemDePedido extends Model
{
    protected $table = "itens_de_pedido";

    public function pedido()
    {
        return $this->belongsTo(Pedido::class);
    }

    use HasFactory;
}
