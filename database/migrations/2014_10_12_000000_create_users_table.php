<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->float('age')->nullable();
            $table->string('phone_no')->nullable();
            $table->string('gender')->nullable();
            $table->integer('user_type')->default(0);
            $table->float('survey_score')->nullable();
            $table->text('description')->nullable();
            $table->text('address')->nullable();
            $table->unsignedBigInteger('doctor_id')->nullable();
            $table->foreign('doctor_id')->references('id')->on('doctors');
            $table->unsignedBigInteger('disease_id')->nullable();
            $table->foreign('disease_id')->references('id')->on('diseases');
            $table->rememberToken();
            $table->timestamps();
            $table->text('doctor_note')->nullable();
            $table->integer('track_art')->nullable();
            $table->integer('track_move')->nullable();
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
};
