<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Estoque;
use App\Models\Produto;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CategoriaSeeder::class
        ]);

        $categorias = Categoria::all()->toArray();
        $faker = Faker::create();
        for($j = 0; $j < count($categorias); $j++) {
            for($i = 1; $i <= $faker->randomNumber(1, false); $i++) {
                Produto::create($this->makeProduto($i +$j*10, $categorias[$j]['id']));
                Estoque::create([
                    'id' => $i +$j*10,
                    'produto_id' => $i +$j*10,
                    'quantidade' => $faker->randomNumber(2, false)
                ]);
            }
        }
    }

    public function makeProduto($id, $categoria_id) {
        $faker = Faker::create();
        return [
            'nome' => $faker->word(),
            'preco' => $faker->randomFloat(2, 1, 25),
            'categoria_id' => $categoria_id,
            'id' => $id
        ];
    }
}