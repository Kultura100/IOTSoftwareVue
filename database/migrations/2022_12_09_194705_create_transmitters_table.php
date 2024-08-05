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
        Schema::create('transmitters', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('status_id');
            $table->foreign('status_id')
            ->references('id')
            ->on('device_statuses');
            $table->string('transmitterId')->unique();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
            ->references('id')
            ->on('users');
            $table->unsignedBigInteger('receiver_id');
            $table->foreign('receiver_id')
            ->references('id')
            ->on('receivers');
            $table->integer('batterypercentage')->nullable();
            $table->float('batteryvoltage')->nullable();
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
        Schema::dropIfExists('transmitters');
    }
};
