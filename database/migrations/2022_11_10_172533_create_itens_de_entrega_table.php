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
        Schema::create('itens_de_entrega', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pedido_id');
            $table->foreign('pedido_id')->references('id')->on('pedidos');
            $table->foreignId('entrega_id');
            $table->foreign('entrega_id')->references('id')->on('entregas');
            $table->foreignId('status_id');
            $table->foreign('status_id')->references('id')->on('statuses');
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
        Schema::dropIfExists('itens_de_entrega');
    }
};
