<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estoque extends Model
{
    protected $fillable = [
        'quantidade',
        'produto_id'
    ];

    public function produto()
    {
        return $this->hasOne(Produto::class);
    }
    
    use HasFactory;
}
