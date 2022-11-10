<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itens_de_pedido', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('quantidade');
            $table->double('preco', 6,2);
            $table->foreignId('pedido_id')->constrained();
            $table->foreignId('produto_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('itens_de_pedido');
    }
};
