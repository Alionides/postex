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
            $table->integer('customer_id')->nullable();
            $table->string('sender_fin');
            $table->string('sender_first_name');
            $table->string('sender_last_name');
            $table->string('sender_phone')->nullable();
            $table->integer('sender_address');
            $table->string('reciever_fin');
            $table->string('receiver_first_name');
            $table->string('receiver_last_name');
            $table->string('receiver_phone')->nullable();
            $table->integer('receiver_address');
            $table->string('tracking_id')->nullable();
            $table->double('kg', 5, 2);
            $table->integer('price');
            $table->string('package_type')->default('qutu');
            $table->text('barcodes')->nullable();
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
