<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::dropIfExists('cat_colour');
        Schema::create('cat_colour', function (Blueprint $table) {
            $table->increments('colour_id');
            $table->string('colour_name');
            $table->timestamps();
        }, 'if not exists');
    }

    public function down()
    {
        Schema::dropIfExists('cat_colour');
    }
};
