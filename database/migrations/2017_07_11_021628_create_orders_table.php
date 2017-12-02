<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('if_pemesanan', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('if_kode_pemesanan')->unique();
            $table->date('if_tanggal_pemesanan');
            $table->string('if_email_pemesan');
            $table->string('if_kode_buku');
            $table->integer('if_jumlah_pemesanan');
            $table->text('if_keterangan');
            $table->enum('if_kode_bayar', ['Belum Bayar', 'Sudah Bayar']);

            $table->foreign('if_kode_buku')->references('if_kode_buku')->on('if_buku')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('if_pemesanan');
    }
}
