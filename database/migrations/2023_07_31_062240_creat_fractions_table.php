<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('fraction', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');    //使用者編號
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('team_id');    //小隊編號
            $table->foreign('team_id')->references('id')->on('teams');
            $table->integer('fraction') ;    //分數紀錄
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fraction');
    }
};
