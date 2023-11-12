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
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->string('typology');
            $table->string('description');
            $table->json('pictures');
            $table->integer('houseSize');
            $table->integer('gardenSize')->nullable();
            $table->integer('score')->nullable();
            $table->date('irrelevantSince')->nullable();
        });

        Schema::create('pictures', function (Blueprint $table) {
            $table->id();
            $table->string('url');
            $table->string('quality');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ads', function (Blueprint $table) {
            $table->dropColumn([
                'typology',
                'description',
                'pictures',
                'houseSize',
                'gardenSize',
                'score',
                'irrelevantSince'
            ]);
        });

        Schema::table('pictures', function (Blueprint $table) {
            $table->dropColumn([
                'url',
                'quality'
            ]);
        });
    }
};
