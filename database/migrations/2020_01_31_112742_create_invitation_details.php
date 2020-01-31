<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvitationDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invitation_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('invitation_id');
            $table->bigInteger('invitation_user_id');
            $table->string('status', 100)
                ->comment('2 -> pending; 1 -> accept; 0 -> reject')->default(2);
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
        Schema::dropIfExists('invitation_details');
    }
}
