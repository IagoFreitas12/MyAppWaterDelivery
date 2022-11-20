<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ItemDeEntrega extends Model
{
    public function pedidos()
    {
        return $this->HasMany(Pedido::class);
    }

    public function entrega()
    {
        return $this->belongsTo(Entrega::class);
    }

    public function entregador()
    {
        return $this->belongsTo(Entregador::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    use HasFactory;
}