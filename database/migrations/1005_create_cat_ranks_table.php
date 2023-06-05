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
        Schema::dropIfExists('cat_ranks');
        Schema::create('cat_ranks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('rank_name');
           $table->timestamps();
        });

         // Insert statement
         DB::table('cat_ranks')->insert([
            ['rank_name' => 'Open'],
            ['rank_name' => 'Bronze'],
            ['rank_name' => 'Silver'],
            ['rank_name' => 'Gold'],
            ['rank_name' => 'Platinum'],
            ['rank_name' => 'Diamond'],
            ['rank_name' => 'Double Grand Champion'],
            ['rank_name' => 'Triple Grand Champion']
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cat_ranks');
    }
};
