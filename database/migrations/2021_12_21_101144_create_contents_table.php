<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('file_path')->max('1000');
            $table->unsignedBigInteger('box_id');

            $table->foreign('box_id')->references('id')->on('boxes')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::table('boxes', function (Blueprint $table) {
           $table->foreign('content_id')->references('id')->on('contents')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contents');
    }
}
