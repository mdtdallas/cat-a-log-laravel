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
        Schema::dropIfExists('cat_genders');
        Schema::create('cat_genders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('gender_name');
            $table->timestamps();
        });

        // Insert statement
        DB::table('cat_genders')->insert([
            ['gender_name' => 'Male', 'created_at' => now()],
            ['gender_name' => 'Female', 'created_at' => now()],
            ['gender_name' => 'Spay', 'created_at' => now()],
            ['gender_name' => 'Neuter', 'created_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cat_genders');
    }
};
