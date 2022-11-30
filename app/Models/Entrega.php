<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrega extends Model
{
    protected $fillable = [
        'pedido_id',
        'entrega_id',
        'status'
    ];

    public function itemDeEntregas()
    {
        return $this->hasMany(ItemDeEntrega::class);
    }

    use HasFactory;
}
