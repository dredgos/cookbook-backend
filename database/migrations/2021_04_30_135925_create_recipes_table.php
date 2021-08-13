<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->string('img_url')->nullable();
            $table->string('recipe_name')->nullable();
            $table->enum('difficulty', ['Easy', 'Medium', 'Hard'])->nullable();
            $table->integer('time')->nullable();
            $table->enum('category', ['Beef', 'Chicken', 'Fish', 'Lamb', 'Pork', 'Veggie'])->nullable();
            $table->string('method')->nullable();
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
        Schema::dropIfExists('recipes');
    }
}
