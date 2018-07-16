<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoneyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('money', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('currency_id')->nullable()->index();
            $table->float('amount');
            $table->unsignedInteger('wallet_id')->nullable()->index();
            $table->softDeletes('deleted');
            $table->foreign('currency_id')->references('id')->on('currency');
            $table->foreign('wallet_id')->references('id')->on('wallet');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('money', function (Blueprint $table) {
            $table->dropForeign(['currency_id']);
            $table->dropForeign(['wallet_id']);
            $table->dropIndex(['currency_id']);
            $table->dropIndex(['wallet_id']);
        });
        Schema::dropIfExists('money');
    }
}
