<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeedbackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedback', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uuid')->unique();
            $table->enum('type', [
                'POLICY',
                'COMMUNITY_INITIATIVES',
                'GENERAL'
            ])->default('POLICY');
            $table->enum('feeling', [
                'NEGATIVE',
                'NEUTRAL',
                'POSITIVE'
            ])->default('NEGATIVE');
            $table->string('comment');
            $table->integer('user_id');
            $table->boolean('publicity')->default(FALSE);
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
        Schema::dropIfExists('feedback');
    }
}
