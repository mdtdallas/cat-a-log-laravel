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
        Schema::create('show_judges', function (Blueprint $table) {
            $table->id('judge_id');
            $table->string('judge_name', 100);
            $table->string('judge_expertise', 255);
            $table->unsignedInteger('council_id');
            $table->unsignedInteger('show_id')->nullable();
            $table->timestamps();

            $table->foreign('council_id')->references('council_id')->on('cat_council');
            $table->foreign('show_id')->references('show_id')->on('cat_show');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('show_judges');
    }
};
