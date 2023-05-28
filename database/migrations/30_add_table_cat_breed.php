<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::dropIfExists('cat_breed');
        Schema::create('cat_breed', function (Blueprint $table) {
            $table->increments('breed_id');
            $table->string('breed_name');
            $table->timestamps();
        }, 'if not exists');
    }

    public function down()
    {
        Schema::dropIfExists('cat_breed');
    }
};
