<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('users')) {
            Schema::create('users', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->longText('name')->nullable();
                $table->string('email', 100)->nullable();
                $table->string('mobile', 100)->nullable();
                $table->string('password', 100)->nullable();
                $table->double('loc_lat')->nullable();
                $table->double('loc_lon')->nullable();
                $table->longText('image')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
}
