<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssetTransferTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asset_transfer', function (Blueprint $table) {
            $table->increments('id');
            $table->string('reason');
            $table->unsignedInteger('fromDept');
            $table->foreign('fromDept')->references('id')->on('departments')->onUpdate('cascade');
            $table->unsignedInteger('toDept');
            $table->foreign('toDept')->references('id')->on('departments')->onUpdate('cascade');
            $table->unsignedInteger('fromUser');
            $table->foreign('fromUser')->references('id')->on('users')->onUpdate('cascade');
            $table->unsignedInteger('toUser');
            $table->foreign('toUser')->references('id')->on('users')->onUpdate('cascade');
            $table->string('assetType');
            $table->unsignedInteger('assetID');
            $table->foreign('assetID')->references('id')->on('assets')->onUpdate('cascade');
            $table->string('comment');
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
        Schema::dropIfExists('asset_transfer');
    }
}
