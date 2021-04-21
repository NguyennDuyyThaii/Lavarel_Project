<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVovTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vov', function (Blueprint $table) {
            $table->id();
            $table->string('title', 191)->unique();
            $table->string('content', 191)->nullable();
            $table->string('author', 191)->nullable();
            $table->string('summary', 191)->nullable();
            $table->string('breadcrumb', 191)->nullable();
            $table->string('date', 191)->nullable();
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
        Schema::dropIfExists('vov');
    }
}
