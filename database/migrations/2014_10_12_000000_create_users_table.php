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
            $table->string('npm');
            $table->string('nama');
            $table->string('email')->unique();
            $table->string('password');
            $table->date('tgl_lahir');
            $table->string('alamat');
            $table->string('no_hp');
            $table->integer('dosen_pembimbing_id')->nullable();
            $table->integer('pembimbing_lapangan_id')->nullable();
            $table->integer('instansi_id')->nullable();
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
