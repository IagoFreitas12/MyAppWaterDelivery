<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormaDePagamento extends Model
{
    public function pedidos()
    {
        return $this->hasMany(Pedido::class);
    }
    
    use HasFactory;
}
