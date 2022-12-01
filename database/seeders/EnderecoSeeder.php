<?php

namespace Database\Seeders;

use App\Models\Cliente;
use App\Models\Endereco;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class EnderecoSeeder extends Seeder
{
    public static function makeEndereco($id, $cliente_id) {
        $faker = Faker::create();
        return [
            'latitude' => $faker->randomFloat(6, -99, 99),
            'longitude' => $faker->randomFloat(7, -99, 99),
            'cliente_id' => $cliente_id,
            'id' => $id
        ];
    }

    public static function makeEnderecos($start_id, $final_id, $cliente_id) {
        $enderecos = [];
        for($id = $start_id; $id < $final_id; $id++) {
            array_push($enderecos, EnderecoSeeder::makeEndereco($id, $cliente_id));
        }
        return $enderecos;
    }
}
