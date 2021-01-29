<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('name', 100);
            $table->string('code', 100)->unique();
            $table->integer('price');
            $table->integer('amount')->nullable();
        });
    }
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
