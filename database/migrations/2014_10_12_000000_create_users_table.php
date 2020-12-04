<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('password');
            $table->integer('priority')->default(0);
            $table->string('FirstName')->nullable();
            $table->string('LastName')->nullable();
            $table->string('MiddleName')->nullable();
            $table->string('ioePost')->nullable();
            $table->string('contactphone')->nullable();
            $table->string('email')->nullable();
            $table->string('imgPathName')->nullable();
            $table->string('personalURL')->nullable();
            $table->string('lictRemarks')->nullable();
            $table->string('publications')->nullable();
            $table->string('prvProfile')->nullable();
            $table->string('lictType')->nullable();
            $table->string('lictTitle')->nullable();
            $table->MEDIUMTEXT('researchAreas')->nullable();
            $table->MEDIUMTEXT('Remarks')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
