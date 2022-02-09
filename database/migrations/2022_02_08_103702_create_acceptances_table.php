<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcceptancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acceptances', function (Blueprint $table) {
            $table->id();
            //$table->unsignedBigInteger('user_id');
            //$table->foreign('user_id')->references('id')->on('customers')->onDelete('restrict');
            $table->integer('customer_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('tracking_id')->nullable();
            $table->integer('kg');
            $table->double('price', 3, 2);
            $table->string('package_type')->default('qutu');
            $table->string('delivery_location')->nullable();
            $table->string('phone')->nullable();
            $table->text('barcodes');
            $table->string('status')->default('qebul edildi');
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
        Schema::dropIfExists('acceptances');
    }
}
