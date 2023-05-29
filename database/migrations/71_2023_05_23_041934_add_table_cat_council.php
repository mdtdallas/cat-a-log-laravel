<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::dropIfExists('cat_council');
        Schema::create('cat_council', function (Blueprint $table) {
            $table->increments('council_id');
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
        }, 'if not exists');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cat_council');
    }
};
