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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->references('id')->on('products');
            $table->string('name_customer');
            $table->string('email_customer');
            $table->string('phone_customer');
            $table->string('address_customer');
            $table->enum('type_customer',['mahasiswa_umum','mahasiswa_praktek','divisi','umum']);
            $table->date('tanggal_sewa');
            $table->date('tanggal_kembali');
            $table->integer('jumlah');
            $table->bigInteger('total_biaya');
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
        Schema::dropIfExists('transactions');
    }
};
