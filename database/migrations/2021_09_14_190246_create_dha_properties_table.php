<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDhaPropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dha_properties', function (Blueprint $table) {
            $table->id();
            $table->string('sector');
            $table->string('plot');
            $table->string('charges');
            $table->string('name');
            $table->string('contact');
            $table->integer('demand');
            $table->longText('description');
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
        Schema::dropIfExists('dha_properties');
    }
}
