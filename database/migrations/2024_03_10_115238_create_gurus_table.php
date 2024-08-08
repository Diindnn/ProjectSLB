<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGurusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gurus', function (Blueprint $table) {
            $table->id();
            $table->string('foto');
            $table->string('nama');
            $table->string('nuptk');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('pendidikan');
            $table->string('alamat');
            $table->string('nohp');
            $table->string('email')->unique();
            $table->string('kelas');
            $table->string('kelass')->nullable();
            $table->string('kelasss')->nullable();
            $table->string('kelassss')->nullable();
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
        Schema::dropIfExists('gurus');
    }
}
