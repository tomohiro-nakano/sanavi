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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('place_name');
            $table->integer('room_temp');
            $table->integer('water_temp');
            $table->float('all_score');
            $table->float('totonoi');
            $table->float('rt_score');
            $table->float('wt_score');
            $table->float('rest_score');
            $table->float('congestion');
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
        Schema::dropIfExists('posts');
    }
};
