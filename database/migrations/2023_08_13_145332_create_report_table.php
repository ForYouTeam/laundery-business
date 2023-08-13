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
        Schema::create('report', function (Blueprint $table) {
            $table->id(11);
            $table->foreign('member_id')->references('id')->on('members')->onDelete('cascade');
            $table->integer('total_order');
            $table->integer('progress');
            $table->integer('canceled');
            $table->integer('done');
            $table->integer('income');
            $table->date('start');
            $table->date('end');
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
        Schema::dropIfExists('report');
    }
};
