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
        Schema::dropIfExists('cat_types');
        Schema::create('cat_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type_name');
           $table->timestamps();
        });

         // Insert statement
         DB::table('cat_types')->insert([
            ['type_name' => 'Long Hair Entire'],
            ['type_name' => 'Long Hair Spay'],
            ['type_name' => 'Long Hair Neuter'],
            ['type_name' => 'Long Hair Companion'],
            ['type_name' => 'Short Hair Entire'],
            ['type_name' => 'Short Hair Spay'],
            ['type_name' => 'Short Hair Neuter'],
            ['type_name' => 'Short Hair Companion'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cat_types');
    }
};
