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
        Schema::dropIfExists('cat_councils');
        Schema::create('cat_councils', function (Blueprint $table) {
            $table->increments('id');
            $table->string('council_name');
            $table->string('council_short_name', 10);
            $table->string('council_img')->nullable();
            $table->string('council_address')->nullable();
            $table->string('council_state', 10);
            $table->string('council_email')->nullable();
            $table->string('council_phone', 20)->nullable();
            $table->string('council_url')->nullable();
            $table->unsignedBigInteger('user_id');
           $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });

        // Insert statement
        DB::table('cat_councils')->insert([
            [
                'council_name' => 'Example Council',
                'council_short_name' => 'EC',
                'council_img' => 'example.jpg',
                'council_address' => '123 Main Street',
                'council_state' => 'CA',
                'council_email' => 'example@example.com',
                'council_phone' => '123-456-7890',
                'council_url' => 'http://example.com',
                'user_id' => 1,
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cat_councils');
    }
};
