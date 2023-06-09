<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::dropIfExists('assigned_judges');
        Schema::create('assigned_judges', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('show_id');
            $table->unsignedInteger('judge_id');
            $table->timestamps();


            $table->foreign('show_id')->references('id')->on('cat_shows')->onDelete('cascade');
            $table->foreign('judge_id')->references('id')->on('show_judges')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assigned_judges');
    }
};
