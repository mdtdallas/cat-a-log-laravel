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
    Schema::dropIfExists('cat_shows');
    Schema::create('cat_shows', function (Blueprint $table) {
        $table->increments('id');
        $table->string('show_name');
        $table->string('show_date');
        $table->string('show_entry_close');
        $table->string('show_img');
        $table->text('show_location');
        $table->string('show_map');
        $table->string('show_rules');
        $table->string('show_covid_plan');
        $table->text('show_description');
        $table->string('created_on');
         $table->timestamp('updated_at')->default(\Carbon\Carbon::now());
    });

    // Insert statement
    DB::table('cat_shows')->insert([
        [
            'show_name' => 'Cat Show 1',
            'show_date' => '2022-01-01',
            'show_entry_close' => '2021-12-15',
            'show_img' => 'show1.jpg',
            'show_location' => 'Location 1',
            'show_map' => 'map1.jpg',
            'show_rules' => 'Rules of Show 1',
            'show_covid_plan' => 'COVID Plan of Show 1',
            'show_description' => 'Description of Show 1',
            'created_on' => now(),
        ],
        [
            'show_name' => 'Cat Show 2',
            'show_date' => '2022-02-02',
            'show_entry_close' => '2022-01-15',
            'show_img' => 'show2.jpg',
            'show_location' => 'Location 2',
            'show_map' => 'map2.jpg',
            'show_rules' => 'Rules of Show 2',
            'show_covid_plan' => 'COVID Plan of Show 2',
            'show_description' => 'Description of Show 2',
            'created_on' => now(),
        ],
        [
            'show_name' => 'Cat Show 3',
            'show_date' => '2022-03-03',
            'show_entry_close' => '2022-02-15',
            'show_img' => 'show3.jpg',
            'show_location' => 'Location 3',
            'show_map' => 'map3.jpg',
            'show_rules' => 'Rules of Show 3',
            'show_covid_plan' => 'COVID Plan of Show 3',
            'show_description' => 'Description of Show 3',
            'created_on' => now(),
        ],
    ]);
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cat_shows');
    }
};
