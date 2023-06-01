<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


return new class extends Migration
{
    
    public function up(): void
    {
        Schema::dropIfExists('cat_breeds');
        Schema::create('cat_breeds', function (Blueprint $table) {
            $table->increments('id');
            $table->string('breed_name');
            $table->timestamp('created_at')->default(\Carbon\Carbon::now());
             $table->timestamp('updated_at')->default(\Carbon\Carbon::now());
        });

        // Insert statement
        DB::table('cat_breeds')->insert([
            ['breed_name' => 'Abyssinian'],
            ['breed_name' => 'American Curl'],
            ['breed_name' => 'American Curl Longhair'],
            ['breed_name' => 'American Shorthair'],
            ['breed_name' => 'Asian'],
            ['breed_name' => 'Australian Mist'],
            ['breed_name' => 'Balinese'],
            ['breed_name' => 'Bengal'],
            ['breed_name' => 'Birman'],
            ['breed_name' => 'Bombay'],
            ['breed_name' => 'British Shorthair'],
            ['breed_name' => 'Burmese'],
            ['breed_name' => 'Burmilla'],
            ['breed_name' => 'Burmilla Longhair'],
            ['breed_name' => 'Chartreux'],
            ['breed_name' => 'Companion'],
            ['breed_name' => 'Cornish Rex'],
            ['breed_name' => 'Cymric'],
            ['breed_name' => 'Cymric Stumpy'],
            ['breed_name' => 'Devon Rex'],
            ['breed_name' => 'Domestic'],
            ['breed_name' => 'Domestic Longhair'],
            ['breed_name' => 'Domestic Shorthair'],
            ['breed_name' => 'Egyptian Mau'],
            ['breed_name' => 'European Shorthair'],
            ['breed_name' => 'Exotic'],
            ['breed_name' => 'Foreign White'],
            ['breed_name' => 'Foreign White Longhair'],
            ['breed_name' => 'German Rex'],
            ['breed_name' => 'Household Longhair'],
            ['breed_name' => 'Household Shorthair'],
            ['breed_name' => 'Japanese Bobtail'],
            ['breed_name' => 'Korat'],
            ['breed_name' => 'La Perm'],
            ['breed_name' => 'La Perm Longhair'],
            ['breed_name' => 'Lykoi'],
            ['breed_name' => 'Maine Coon'],
            ['breed_name' => 'Mandalay'],
            ['breed_name' => 'Manx'],
            ['breed_name' => 'Manx Stumpy'],
            ['breed_name' => 'Munchkin'],
            ['breed_name' => 'Norwegian Forest Cat'],
            ['breed_name' => 'Neva Masqerade'],
            ['breed_name' => 'Ocicat'],
            ['breed_name' => 'Oriental'],
            ['breed_name' => 'Oriental Longhair'],
            ['breed_name' => 'Persian'],
            ['breed_name' => 'Peterbald'],
            ['breed_name' => 'Pixiebob'],
            ['breed_name' => 'Ragdoll'],
            ['breed_name' => 'Russian'],
            ['breed_name' => 'Scottish Fold'],
            ['breed_name' => 'Scottish Fold Longhair'],
            ['breed_name' => 'Scottish Longhair'],
            ['breed_name' => 'Scottish Shorthair'],
            ['breed_name' => 'Selkirk Rex'],
            ['breed_name' => 'Selkirk Rex Longhair'],
            ['breed_name' => 'Siamese'],
            ['breed_name' => 'Siberian'],
            ['breed_name' => 'Singapura'],
            ['breed_name' => 'Snowshoe'],
            ['breed_name' => 'Somali'],
            ['breed_name' => 'Sphynx'],
            ['breed_name' => 'Tonkinese'],
            ['breed_name' => 'Toyger'],
            ['breed_name' => 'Turkish Angora'],
            ['breed_name' => 'Turkish Van'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cat_breeds');
    }
};
