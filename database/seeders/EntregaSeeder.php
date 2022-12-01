<?php

namespace Database\Seeders;

use App\Helpers\EntregaHelper;
use App\Models\Entrega;
use App\Models\ItemDeEntrega;
use App\Models\Pedido;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class EntregaSeeder extends Seeder
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
        $pedidos = Pedido::where('status', 2)->get()->toArray();
        while(count($pedidos)!=0) {
            // gera um numero aleatorio de produtos
            $numero_de_pedidos = $this->faker->numberBetween(1, count($pedidos));
            print_r([$numero_de_pedidos]);
            for($i = 1; $i <= $numero_de_pedidos; $i++) {
                $pedido = array_pop($pedidos);
                $itemDeEntrega = ItemDeEntrega::where('pedido_id', $pedido['id'])->get()->toArray();
                if (!count($itemDeEntrega)) {
                    $entrega = Entrega::create();
                    ItemDeEntrega::create($this->makeItemDeEntrega($entrega['id'], $pedido['id']));
                }
            }
        }
    }

    public function makeItemDeEntrega($entrega_id, $pedido_id) {
        return [
            'entrega_id' => $entrega_id,
            'pedido_id' => $pedido_id,
            'status' => array_rand(EntregaHelper::get_statuses())
        ];
    }
}