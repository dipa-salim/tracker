<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipment_histories', function (Blueprint $table) {
            $table->bigIncrements('id_shipment_histories');
            $table->unsignedBigInteger('id_shipment');
            $table->string('username');
            $table->string('name');
            $table->string('role');
            $table->string('client_name');
            $table->string('client_place');
            $table->string('status');
            $table->string('spb_number');
            $table->timestamps();
            $table->string('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shipment_histories');
    }
};
