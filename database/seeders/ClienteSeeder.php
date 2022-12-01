<?php

namespace Database\Seeders;

use App\Models\Cliente;
use App\Models\Endereco;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        // cria  categorias com id de 1 a 5
        for($id = 1; $id <=10; $id++) {
            Cliente::create($this->makeCliente($id));
            $enderecos = EnderecoSeeder::makeEnderecos(2*$id-1, 2*$id+1, $id);
            foreach($enderecos as $endereco) {
                Endereco::create($endereco);
            }
        }
    }

    public function makeCliente($id) {
        $faker = Faker::create();
        return [
            'id' => $id,
            'nome' => $faker->firstName(),
            'sobrenome' =>$faker->lastName(),
            'cpf_cnpj'=> $faker->numerify('###########'),
            'telefone' => $faker->numerify('989########')
        ];
    }
}