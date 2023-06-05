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
        Schema::dropIfExists('user_roles');
        Schema::create('user_roles', function (Blueprint $table) {
            $table->id('id');
            $table->string('role_name');
           $table->timestamps();
        });

         // Insert statement
         DB::table('user_roles')->insert([
            ['role_name' => 'User'],
            ['role_name' => 'Manager'],
            ['role_name' => 'Admin'],
           
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_roles');
    }
};
