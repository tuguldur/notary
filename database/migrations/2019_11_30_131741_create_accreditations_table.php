<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccreditationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accreditations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('location');
            $table->string('province');
            $table->string('city');
            $table->string('street');
            $table->string('house_number');
            $table->string('number');
            $table->string('lastname');
            $table->string('firstname');
            $table->string('userreg_number');
            $table->string('value');
            $table->string('city2');
            $table->string('district');
            $table->string('khoroo');
            $table->string('street2');
            $table->string('house_number2');
            $table->string('number2');
            $table->string('replastname');
            $table->string('repfirstname');
            $table->string('timedate');
            $table->string('repname');
            $table->string('rep_pass_number');
            $table->string('reg_number');
            $table->string('trusteename');
            $table->string('trusteepassnumber');
            $table->string('trusteeregnumber');
            $table->string('status');
            $table->string('notary_id');
            $table->string('user_id');
            $table->string('price')->default('10000');
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
        Schema::dropIfExists('accreditations');
    }
}
