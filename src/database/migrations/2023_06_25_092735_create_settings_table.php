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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->enum('range', ['すべて', '完璧', '苦手', '未学習'])->default('すべて');
            $table->integer('number')->default(30);
            $table->enum('order', ['asc', 'desc', 'rand'])->default('asc');
            $table->boolean('limit')->default(false);
            $table->integer('limit_time')->default(15);
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
        Schema::dropIfExists('settings');
    }
};
