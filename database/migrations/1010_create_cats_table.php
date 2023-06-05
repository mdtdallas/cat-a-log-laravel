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
        Schema::dropIfExists('cats');
        Schema::create('cats', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cat_name');
            $table->string('date_of_birth');
            $table->text('cat_bio');
            $table->string('cat_img');
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
            $table->timestamps();

            $table->foreign('gender_id')->references('id')->on('cat_genders');
            $table->foreign('breed_id')->references('id')->on('cat_breeds');
            $table->foreign('colour_id')->references('id')->on('cat_colours');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('type_id')->references('id')->on('cat_types');
            $table->foreign('rank_id')->references('id')->on('cat_ranks');
        });

        DB::table('cats')->insert([
            'cat_name' => 'Fluffy',
            'date_of_birth' => '2022-01-01',
            'cat_bio' => 'Fluffy is a friendly and playful cat.',
            'cat_img' => 'fluffy.jpg',
            'cat_registration' => 'ABC123',
            'cat_breeder_name' => 'John Doe',
            'cat_sire_name' => 'Sire',
            'cat_dam_name' => 'Dam',
            'gender_id' => 1,
            'breed_id' => 2,
            'colour_id' => 3,
            'user_id' => 1,
            'type_id' => 4,
            'rank_id' => 5,
            'slug' => 'fluffy',
            'view_count' => 30,
        ]);

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cats');
    }
};
