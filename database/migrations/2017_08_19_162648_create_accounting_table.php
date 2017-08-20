<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('accounting', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->mediumInteger('value');
            $table->string('project_no', '255');
            $table->string('p_type', '60');
            $table->string('stage', '100');
            $table->string('image')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
