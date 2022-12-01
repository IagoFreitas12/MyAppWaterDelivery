<?php

namespace Database\Seeders;

use App\Models\FormaDePagamento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class FormaDePagamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FormaDePagamento::create([
            'metodo' => 'cartao de credito',
            'id' => 1
        ]);
        FormaDePagamento::create([
            'metodo' => 'cartao de debito',
            'id' => 2
        ]);
        FormaDePagamento::create([
            'metodo' => 'a vista',
            'id' => 3
        ]);
    }

    public static function get_random() {
        $result = FormaDePagamento::all()->toArray();
        return $result[array_rand($result, 1)];
    }
}
