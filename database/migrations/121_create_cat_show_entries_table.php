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
        Schema::create('cat_show_entries', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('cat_id');
            $table->unsignedInteger('show_id');
            $table->date('entry_date');
            $table->string('entry_kitten');
            $table->string('entry_placement');
            $table->string('entry_score');
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
        Schema::dropIfExists('cat_show_entries');
    }
};
