<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('groups', function (Blueprint $table) {
            $table->unsignedBigInteger('gym_id');
            $table->foreign('gym_id')->references('id')->on('gyms')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */





    public function down()
    {
        Schema::table('groups', function (Blueprint $table) {
            $table->dropForeign(['gym_id']);
            $table->dropColumn('gym_id');
        });
    }
};




