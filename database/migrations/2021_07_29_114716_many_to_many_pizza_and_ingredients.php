<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ManyToManyPizzaAndIngredients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pizzasIngredients', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pizza');
            $table->unsignedBigInteger('ingredient');
            $table->timestamps();

            $table->foreign('pizza') -> references('id') -> on('pizzas');
            $table->foreign('ingredient') -> references('id') -> on('ingredients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pizzasIngredients');
    }
}
