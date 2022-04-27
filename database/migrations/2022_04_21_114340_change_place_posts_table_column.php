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
        Schema::table('place_posts', function (Blueprint $table) {
                $table->dropColumn('all_score');
                $table->dropColumn('totonoi');
                $table->dropColumn('rt_score');
                $table->dropColumn('wt_score');
                $table->dropColumn('rest_score');
                $table->dropColumn('congestion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('place_posts', function (Blueprint $table) {
            //
        });
    }
};
