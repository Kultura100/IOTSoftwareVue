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
        Schema::create('reads', function (Blueprint $table) {
            $table->id();
            $table->string('humidity')->nullable();
            $table->string('temperature1')->nullable();
            $table->string('temperature2')->nullable();
            $table->boolean('islight')->nullable();
            $table->integer('lightlevel')->nullable();
            $table->boolean('israining')->nullable();
            $table->unsignedBigInteger('transmitter_id');
            $table->foreign('transmitter_id')
            ->references('id')
            ->on('transmitters');
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
        Schema::dropIfExists('reads');
    }
};
