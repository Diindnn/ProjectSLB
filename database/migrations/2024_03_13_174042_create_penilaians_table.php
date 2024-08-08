<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenilaiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penilaians', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pertanyaan_id');
            $table->unsignedBigInteger('perkembangan_id');
            $table->integer('skala');
            $table->text('catatan');

            $table->timestamps();

            $table->foreign('pertanyaan_id')->references('id')->on('pertanyaans')->onDelete('CASCADE');
            $table->foreign('perkembangan_id')->references('id')->on('perkembangans')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penilaians');
    }
}
