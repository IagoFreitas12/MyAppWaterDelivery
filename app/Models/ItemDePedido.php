<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPSTORM_META\map;

class ItemDePedido extends Model
{
    protected $table = "itens_de_pedido";
    protected $fillable = [
        'quantidade',
        'preco',
        'pedido_id',
        'produto_id'
    ];

    public function pedido()
    {
        return $this->belongsTo(Pedido::class);
    }

    use HasFactory;
}
