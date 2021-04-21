<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaivietTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baiviet', function (Blueprint $table) {
            $table->id();
            $table->string('title', 191)->unique();
            $table->string('content', 191)->nullable();
            $table->string('author', 191)->nullable();
            $table->string('short_desc', 191)->nullable();
            $table->string('image')->nullable();
            $table->unsignedBigInteger('danh_muc_id');
            $table->foreign('danh_muc_id')
                    ->references('id')->on('danhmuc');
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
        Schema::dropIfExists('baiviet');
    }
}
