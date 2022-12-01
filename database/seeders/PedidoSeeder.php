<?php

namespace Database\Seeders;

use App\Helpers\PedidoHelper;
use App\Models\Cliente;
use App\Models\Endereco;
use App\Models\Pedido;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $clientes = Cliente::all()->toArray();
        foreach($clientes as $cliente) {
            for($i = 1; $i <= $faker->randomNumber(1, false) ; $i++) {
                $pedido = Pedido::create($this->makePedido($cliente['id']));
            }
        }
    }

    public function makeItemDePedido() {}

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
