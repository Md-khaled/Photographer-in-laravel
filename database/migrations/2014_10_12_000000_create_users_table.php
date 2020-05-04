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
            $table->unsignedBigInteger('district_id')->nullable();
            $table->foreign('district_id') ->references('id')->on('districts') ->onDelete('cascade');
            $table->string('name');
            $table->string('mobile')->unique();
            $table->string('types')->default('user');
            $table->string('gender')->default('male');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('image')->default('storage/app/public/profile/male.png');
            $table->longText('address')->nullable();
            $table->longText('about_me')->nullable();
            $table->tinyInteger('role')->default(2)->comment('0=admin,1=photograph,2=user');
            $table->tinyInteger('status')->default(1);
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
