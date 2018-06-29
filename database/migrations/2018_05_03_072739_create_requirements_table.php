<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequirementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requirements', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('scholarship_id')->unsigned();
            $table->float('gda');
            $table->string('semester');
            $table->date('deadline');
            $table->string('faculty');
            $table->string('program');
            $table->timestamps();

            $table->foreign('scholarship_id')->references('id')->on('scholarships')->onDelete('CASCADE');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requirements');
    }
}
