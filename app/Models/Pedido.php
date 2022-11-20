<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{   
    public function clientes()
    {
        return $this->hasMany(Cliente::class);
    }

    public function formaDePagamento()
    {
        return $this->belongsTo(FormaDePagamento::class);
    }

    public function itemDeEntrega()
    {
        return $this->belongsTo(ItemDeEntrega::class);
    }
    
    public function itemDePedido()
    {
        return $this->belongsTo(ItemDePedido::class);
    }
    

    use HasFactory;
}
