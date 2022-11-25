<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{       
    public function itemDePedidos()
    {
        return $this->hasMany(ItemDePedido::class);
    }
    
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function formaDePagamento()
    {
        return $this->belongsTo(FormaDePagamento::class);
    }

    public function itemDeEntrega()
    {
        return $this->belongsTo(ItemDeEntrega::class);
    }
    
    use HasFactory;
}
