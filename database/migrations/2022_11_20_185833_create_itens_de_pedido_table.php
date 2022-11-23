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
            $table->foreignId('pedido_id');
            $table->foreign('pedido_id')->references('id')->on('pedidos');
            $table->foreignId('produto_id');
            $table->foreign('produto_id')->references('id')->on('produtos');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
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
