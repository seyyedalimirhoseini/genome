<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('lastname');
            $table->string('nationalcode');
            $table->string('phone');
            $table->string('email')->unique();
            $table->string('field')->nullable();
            $table->string('degree')->nullable();
            $table->string('address')->nullable();
            $table->string('image')->nullable();
            $table->bigInteger('state_id')->unsigned();
//            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');

            $table->bigInteger('city_id')->unsigned();
//            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
//            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');

            $table->string('role')->default('user');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('code')->nullable();
            $table->boolean('active')->default(0);
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
        Schema::dropIfExists('users');
    }
}
