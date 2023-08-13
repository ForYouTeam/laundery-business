<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member', function (Blueprint $table) {
            $table->id(11);
            $table->string('name', 150);
            $table->string('nik', 25); // Mengubah 'id' menjadi 'member_id'
            $table->string('address', 255);
            $table->string('phone', 13);
            $table->string('email', 50);
            $table->foreign('laundry_id')->references('id')->on('laundry')->onDelete('cascade');
            $table->boolean('verify');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
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
        Schema::dropIfExists('member');
    }
}
