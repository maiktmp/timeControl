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

        Schema::create('rol', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });
        Schema::create('permission', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });
        Schema::create('user', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('rfid');
            $table->string('username')->unique();
            $table->string('last_name');
            $table->string('password');
            $table->string('email');
            $table->rememberToken();
            $table->timestamps();

            $table->unsignedInteger('fk_id_rol');
            $table->foreign('fk_id_rol')
                ->references('id')
                ->on('rol');
        });
        Schema::create('group', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->time('start_hour');
            $table->time('end_hour');
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
        Schema::create('day', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });
        Schema::create('group_has_day', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('fk_id_group');
            $table->unsignedInteger('fk_id_day');

            $table->foreign('fk_id_day')
                ->references('id')
                ->on('day');

            $table->foreign('fk_id_group')
                ->references('id')
                ->on('group');
        });
        Schema::create('user_has_group', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('fk_id_user');
            $table->unsignedInteger('fk_id_group');
            $table->unsignedInteger('fk_id_permission');
            $table->timestamps();

            $table->foreign('fk_id_user')
                ->references('id')
                ->on('user');

            $table->foreign('fk_id_group')
                ->references('id')
                ->on('group');

            $table->foreign('fk_id_permission')
                ->references('id')
                ->on('permission');
        });
        Schema::create('assistance', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('fk_id_user_has_group');
            $table->timestamps();

            $table->foreign('fk_id_user_has_group')
                ->references('id')
                ->on('user_has_group');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assistance');
        Schema::dropIfExists('user_has_group');
        Schema::dropIfExists('group_has_day');
        Schema::dropIfExists('day');
        Schema::dropIfExists('group');
        Schema::dropIfExists('user');
        Schema::dropIfExists('permission');
        Schema::dropIfExists('rol');
    }
}
