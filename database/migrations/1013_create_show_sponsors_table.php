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
        Schema::dropIfExists('show_sponsors');
        Schema::create('show_sponsors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sponsor_name', 30);
            $table->string('sponsor_img', 255);
            $table->string('sponsor_url', 255);
           $table->timestamps();
        });
        
        // Insert statement
        DB::table('show_sponsors')->insert([
            'sponsor_name' => 'Sponsor 1',
            'sponsor_img' => 'sponsor1.jpg',
            'sponsor_url' => 'https://www.sponsor1.com',
        ]);
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('show_sponsors');
    }
};
