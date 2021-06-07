<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('designation');
            $table->string('phone');
            $table->string('address1');
            $table->string('address2')->nullable();
            $table->string('city');
            $table->integer('state_id');
            $table->enum('gender',['Male','Female']);
            $table->integer('zipcode');
            $table->enum('relationship_status',['Single','Married']);
            $table->date('dob');            
            //$table->timestamp('email_verified_at')->nullable();
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
