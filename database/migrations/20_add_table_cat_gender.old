<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        Schema::dropIfExists('cat_gender');
        Schema::create('cat_gender', function (Blueprint $table) {
            $table->increments('gender_id');
            $table->string('gender_name');
            $table->timestamps();
        }, 'if not exists');
    }

    
    public function down()
    {
        Schema::dropIfExists('cat_gender');
    }
};
