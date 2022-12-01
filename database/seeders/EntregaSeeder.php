<?php

namespace Database\Seeders;

use App\Models\Entrega;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class EntregaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // cria Random pedidos com id de 1 a Random
        $faker = Faker::create();
        for($id = 1 ; $id <= $faker->randomDigitNotNull() ; $id++){
            Entrega::create($this->makeEntrega($id));
        }
    }

    public function makeEntrega($id) {
        $faker = Faker::create();
        return [
            'id' => $id
        ];
    }


}
