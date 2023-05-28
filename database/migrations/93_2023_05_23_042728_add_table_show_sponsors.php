<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::dropIfExists('show_sponsor');
        Schema::create('show_sponsor', function (Blueprint $table) {
            $table->id('sponsor_id');
            $table->string('sponsor_name', 30);
            $table->string('sponsor_img', 255);
            $table->string('sponsor_url', 255);
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
        Schema::dropIfExists('show_sponsor');
    }
};
