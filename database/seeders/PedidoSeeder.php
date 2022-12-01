<?php

namespace Database\Seeders;

use App\Helpers\PedidoHelper;
use App\Models\Cliente;
use App\Models\Endereco;
use App\Models\ItemDePedido;
use App\Models\Pedido;
use App\Models\Produto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Faker\Generator;

class PedidoSeeder extends Seeder
{
    public function __construct()
    {
        $this->faker = Faker::create();
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clientes = Cliente::all()->toArray();
        foreach($clientes as $cliente) {
            for($i = 1; $i <= $this->faker->randomNumber(1, false) ; $i++) {
                $pedido = Pedido::create($this->makePedido($cliente['id']));
                for($j = 1; $j <= $this->faker->randomNumber(1, false) ; $j++) {
                    ItemDePedido::create($this->makeItemDePedido($pedido['id']));
                }
            }
        }
    }

    public function makeItemDePedido($pedido_id) {
        $produtos = Produto::all()->toArray();
        return [
            'quantidade' => $this->faker->randomNumber(1, false),
            'preco' => $produtos[array_rand($produtos, 1)]['preco'],
            'pedido_id' => $pedido_id,
            'produto_id' => $produtos[array_rand($produtos, 1)]['id']
        ];
    }

    public function makePedido($cliente_id) {
        $enderecos = Endereco::where('cliente_id', $cliente_id)->get()->toArray();
        $endereco = $enderecos[array_rand($enderecos, 1)];
        return [
            'cliente_id' => $cliente_id,
            'endereco_id' => $endereco['id'],
            'forma_de_pagamento_id' => FormaDePagamentoSeeder::get_random()['id'],
            'status' => array_rand(PedidoHelper::get_statuses(), 1)
        ];
    }
}
