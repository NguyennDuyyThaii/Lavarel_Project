<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLuotxemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('luotxem', function (Blueprint $table) {
            $table->id();
            $table->integer('views');
            $table->unsignedBigInteger('bai_viet_id');
            $table->foreign('bai_viet_id')
                    ->references('id')->on('baiviet');
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
        Schema::dropIfExists('luotxem');
    }
}
