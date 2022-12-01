<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // cria 5 categorias com id de 1 a 5
        for($id = 1 ; $id <= 10 ; $id++){
            Categoria::create($this->makeCategoria($id));
        }
    }

    public function makeCategoria($id) {
        $faker = Faker::create();
        return [
            'rotulo' => $faker->domainWord(),
            'id' => $id
        ];
    }
}