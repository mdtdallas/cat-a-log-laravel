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
        Schema::create('cats', function (Blueprint $table) {
            $table->increments('cat_id');
            $table->string('cat_name');
            $table->string('date_of_birth');
            $table->text('cat_bio');
            $table->string('cat_img');
            $table->string('cat_gender');
            $table->string('cat_registration');
            $table->string('cat_breeder_name');
            $table->string('cat_sire_name');
            $table->string('cat_dam_name');
            $table->unsignedInteger('gender_id')->nullable();
            $table->unsignedInteger('breed_id')->nullable();
            $table->unsignedInteger('colour_id')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedInteger('type_id')->nullable();
            $table->unsignedInteger('rank_id')->nullable();
            $table->string('slug');
            $table->unsignedInteger('view_count')->nullable();
            $table->string('created_on');

            $table->foreign('gender_id')->references('gender_id')->on('cat_gender');
            $table->foreign('breed_id')->references('breed_id')->on('cat_breed');
            $table->foreign('colour_id')->references('colour_id')->on('cat_colour');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('type_id')->references('type_id')->on('cat_type');
            $table->foreign('rank_id')->references('rank_id')->on('cat_rank');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cats');
    }
};
