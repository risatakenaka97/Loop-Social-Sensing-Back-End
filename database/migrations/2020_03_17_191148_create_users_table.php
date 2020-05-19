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
            $table->bigIncrements('id');
            $table->string('firstName')->nullable();
            $table->string('lastName')->nullable();
            $table->string('avatar')->nullable();
            $table->string('email')->unique();
            $table->string('city')->nullable();
            $table->string('address')->nullable();
            $table->string('occupation')->nullable();
            $table->string('password');
            $table->integer('organization_id')->unsigned()->nullable();
            $table->boolean('approved')->default(FALSE);
            $table->boolean('first_entrance')->default(TRUE);
            $table->enum('role', [
                'ADMIN',
                'BASIC'
            ])->default('BASIC');
            $table->timestamps();
            $table->foreign('organization_id')
                ->references('id')
                ->on('organizations');
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
