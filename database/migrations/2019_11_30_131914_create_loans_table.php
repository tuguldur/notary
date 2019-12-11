<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('location');
            $table->string('city');
            $table->string('district');
            $table->string('khoroo');
            $table->string('user_regnumber');
            $table->string('lastname');
            $table->string('firstname');
            $table->string('city1');
            $table->string('district1');
            $table->string('khoroo1');
            $table->string('user_regnumber1');
            $table->string('lastname1');
            $table->string('firstname1');
            $table->string('price1');
            $table->string('date1');
            $table->string('date2');
            $table->string('date3');
            $table->string('price2');
            $table->string('date4');
            $table->string('hvv');
            $table->string('baritsaa');
            $table->string('percent');
            $table->string('exday');
            $table->string('lastname2');
            $table->string('firstname2');
            $table->string('location1');
            $table->string('phone_numbers');
            $table->string('password_number');
            $table->string('regnumber2');
            $table->string('bankaccount');
            $table->string('lastname3');
            $table->string('firstname3');
            $table->string('location2');
            $table->string('phone_numbers2');
            $table->string('passwordnumber2');
            $table->string('reg_number3');
            $table->string('bankaccount2');
            $table->string('status');
            $table->string('price');
            $table->string('notary_id');
            $table->string('user_id');
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
        Schema::dropIfExists('loans');
    }
}
