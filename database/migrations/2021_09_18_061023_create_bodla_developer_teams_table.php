<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBodlaDeveloperTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bodla_developer_teams', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('name');
            $table->enum('designation', ['1', '2'])->comment('1. Team Lead, 2. Team Member');
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
        Schema::dropIfExists('bodla_developer_teams');
    }
}
