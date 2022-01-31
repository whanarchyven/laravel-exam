<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usages', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('thing_id');
            $table->unsignedBigInteger('place_id');

            $table->index('user_id','usage_user_idx');
            $table->index('thing_id','usage_thing_idx');
            $table->index('place_id','usage_place_idx');

            $table->foreign('user_id','usage_user_fk')->on('users')->references('id');
            $table->foreign('thing_id','usage_thing_fk')->on('things')->references('id');
            $table->foreign('place_id','usage_place_fk')->on('places')->references('id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usages');
    }
}
