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
        Schema::create('show_results', function (Blueprint $table) {
            $table->id('result_id');
            $table->unsignedInteger('cat_id');
            $table->unsignedInteger('show_id');
            $table->string('placement', 100);
            $table->integer('score');
            $table->timestamps();

            $table->foreign('cat_id')->references('cat_id')->on('cat');
            $table->foreign('show_id')->references('show_id')->on('cat_show');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('show_results');
    }
};
