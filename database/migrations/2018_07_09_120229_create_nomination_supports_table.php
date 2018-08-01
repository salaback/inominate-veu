<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNominationSupportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nomination_supports', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->float('contribution', 8, 2);
            $table->boolean('walk')->default(false);
            $table->boolean('call')->default(false);
            $table->boolean('host')->default(false);
            $table->boolean('yardSign')->default(false);
            $table->boolean('signPetition')->default(false);
            $table->text('statement')->nullable();
            $table->integer('nomination_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nomination_supports');
    }
}
