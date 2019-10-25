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
            $table->string('name',100)->unique();
            $table->string('ip_address',20);
            $table->integer('country_id');
            $table->string('city',50);
            $table->string('postal_code',20);
            $table->string('first_name',20);
            $table->string('sur_name',20);
            $table->string('username',50);
            $table->string('email',50);
            $table->string('password',50);
            $table->string('address',50);
            $table->string('contact',50);
            $table->string('role',50);
            $table->integer('parent');
            $table->string('sponsor',50);
            $table->integer('position');
            $table->string('image',1000);
            $table->string('cover',1000);
            $table->string('status',50);
            $table->integer('package_id');
            $table->string('unique_id',100);
            $table->integer('country_code');
            $table->dateTime('created_date_time');
            $table->dateTime('updated_date_time');
            $table->foreign('parent')->references('users')->on('id');
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
