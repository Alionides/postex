<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();            
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('fin')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('is_corp')->default('individual');
            $table->string('status')->default('deactive');
            $table->date('dob')->nullable();
            $table->string('phone')->nullable();
            $table->text('notes')->nullable();
            $table->string('calendly_url')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('customers');
    }
}
