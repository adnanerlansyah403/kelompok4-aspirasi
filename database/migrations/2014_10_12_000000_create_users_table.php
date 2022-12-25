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
            $table->string('nama');
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean("role")->default(0);
            $table->text("tentang")->nullable();
            $table->bigInteger("nik")->nullable();
            $table->text("alamat")->nullable();
            $table->enum("gender", ["laki", "perempuan"])->default("laki");
            $table->date("tanggal_lahir")->nullable();
            $table->string("no_telp")->nullable();
            $table->string('gambar')->nullable();
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
};
