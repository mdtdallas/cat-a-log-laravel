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
        Schema::create('cat_shows', function (Blueprint $table) {
            $table->increments('show_id');
            $table->string('show_name');
            $table->string('show_date');
            $table->string('show_entry_close');
            $table->string('show_img');
            $table->text('show_location');
            $table->string('show_map');
            $table->string('show_rules');
            $table->string('show_covid_plan');
            $table->text('show_description');
            $table->string('created_on');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cat_shows');
    }
};
