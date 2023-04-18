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
        Schema::create('sabers', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('kelas');
            $table->string('no_hp');
            $table->date('bulan');
            $table->integer('jml_bayar');
            $table->date('tgl_bayar');
            $table->string('pembayaran');
            $table->text('keterangan');
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
        Schema::dropIfExists('sabers');
    }
};
