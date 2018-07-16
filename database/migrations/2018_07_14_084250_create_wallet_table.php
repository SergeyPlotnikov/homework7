<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWalletTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wallet', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->softDeletes('deleted');
            $table->index('user_id');
            $table->foreign('user_id')->references('id')->on('user')->onDelete('cascade');
        });
//
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('wallet', function (Blueprint $table) {
            $table->dropForeign('wallet_user_id_foreign');
            $table->dropIndex(['user_id']);
        });
        Schema::dropIfExists('wallet');
    }
}
