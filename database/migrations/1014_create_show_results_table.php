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
        Schema::dropIfExists('show_results');
        Schema::create('show_results', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedInteger('cat_id');
            $table->unsignedInteger('show_id');
            $table->string('placement', 100);
            $table->integer('score');
            $table->timestamp('created_at')->default(\Carbon\Carbon::now());
             $table->timestamp('updated_at')->default(\Carbon\Carbon::now());

            $table->foreign('cat_id')->references('id')->on('cats');
            $table->foreign('show_id')->references('id')->on('cat_shows');
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
