<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // cria 3 status com id de 1 a 3
        for($id = 1 ; $id <= 3 ; $id++){
            Status::create($this->makeStatus($id));
        }
    }

    public function makeStatus($id) {
        return [
            'id' => $id
        ];
    }
}
