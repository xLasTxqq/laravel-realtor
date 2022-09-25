<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Applications extends Migration
{
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('number');
            $table->date('dateapplication');
            $table->integer('numberhouse');
            $table->integer('numberflat');
            $table->longText('comment1');
            $table->string('status');
            $table->date('datemeeting')->nullable();
            $table->longText('comment2')->nullable();
            $table->date('agreedate')->nullable();
            $table->integer('idflat')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::drop('applications');
    }
}
