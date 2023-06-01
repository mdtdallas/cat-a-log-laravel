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
        Schema::dropIfExists('show_judges');
        Schema::create('show_judges', function (Blueprint $table) {
            $table->increments('id');
            $table->string('judge_name', 100);
            $table->string('judge_expertise', 255);
            $table->unsignedInteger('council_id');
            $table->unsignedInteger('show_id')->nullable();
            $table->timestamp('created_at')->default(\Carbon\Carbon::now());
            $table->timestamp('updated_at')->default(\Carbon\Carbon::now());
        
            $table->foreign('council_id')->references('id')->on('cat_councils');
            $table->foreign('show_id')->references('id')->on('cat_shows');
        });
        
        // Insert statements
        DB::table('show_judges')->insert([
            [
                'judge_name' => 'Judge 1',
                'judge_expertise' => 'Expertise 1',
                'council_id' => 1,
                'show_id' => 1,
                'created_at' => now(),
            ],
            [
                'judge_name' => 'Judge 2',
                'judge_expertise' => 'Expertise 2',
                'council_id' => 1,
                'show_id' => 1,
                'created_at' => now(),
            ],
            [
                'judge_name' => 'Judge 3',
                'judge_expertise' => 'Expertise 3',
                'council_id' => 1,
                'show_id' => 1,
                'created_at' => now(),
            ],
        ]);
        
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('show_judges');
    }
};
