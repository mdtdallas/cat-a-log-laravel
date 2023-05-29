<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('cat_show_entry');
        Schema::create('cat_show_entry', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('cat_id');
            $table->unsignedInteger('show_id');
            $table->date('entry_date');
            $table->string('entry_kitten');
            $table->string('entry_placement');
            $table->string('entry_score');
            $table->timestamps();

            $table->foreign('cat_id')->references('cat_id')->on('cat');
            $table->foreign('show_id')->references('show_id')->on('cat_show');
        }, 'if not exists');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cat_show_entry');
    }
};
