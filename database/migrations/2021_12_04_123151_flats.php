<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Flats extends Migration
{
    public function up()
    {
        Schema::create('flats', function (Blueprint $table) {
            $table->id();
            $table->integer('numberhouse');
            $table->integer('floor');
            $table->integer('numberflat');
            $table->integer('rooms');
            $table->double('area');
            $table->double('livingspace');
            $table->double('cost');
            $table->string('status');
            $table->date('booked')->nullable();
            $table->string('purchasedname')->nullable();;
            $table->string('purchasedphone')->nullable();;
            $table->integer('idapplication')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::drop('flats');
    }
}
