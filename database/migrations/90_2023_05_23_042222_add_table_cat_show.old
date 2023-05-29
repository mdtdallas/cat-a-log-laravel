<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::dropIfExists('cat_show');
        Schema::create('cat_show', function (Blueprint $table) {
            $table->increments('show_id');
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
            $table->timestamps();
        }, 'if not exists');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cat_show');
    }
};
