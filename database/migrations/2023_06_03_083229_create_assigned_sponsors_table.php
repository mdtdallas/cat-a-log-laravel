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
        Schema::dropIfExists('assigned_sponsors');
        Schema::create('assigned_sponsors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('show_id');
            $table->unsignedBigInteger('sponsor_id');
            $table->timestamps();
        
            $table->foreign('show_id')->references('id')->on('cat_shows')->onDelete('cascade');
            $table->foreign('sponsor_id')->references('id')->on('show_sponsors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assigned_sponsors');
    }
};
