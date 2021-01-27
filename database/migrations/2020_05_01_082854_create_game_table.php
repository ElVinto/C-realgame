<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('game', function (Blueprint $table) {
            $table->increments('idGame')->index();
            $table->string('nameGame');
            $table->string('dateGame');
            $table->string('userId');
            $table->string('priceTermGame');
            $table->string('priceSpotGame');
            $table->string('replay');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('game', function (Blueprint $table) {
            Schema::dropIfExists('game');
        });
    }
}
