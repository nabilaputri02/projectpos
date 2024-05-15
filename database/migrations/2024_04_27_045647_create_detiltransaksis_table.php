<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detiltransaksis', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('transaksi_id')->unsigned();
            $table->bigInteger('produk_id')->unsigned();
            $table->integer('qty');
            $table->double('price');
            $table->timestamps();
        });

        Schema::table('detiltransaksis', function(Blueprint $table) {

         $table->foreign('transaksi_id')->references('id')->on('transaksis')
                ->onUpdate('cascade') ->onDelete('cascade');
               
           
     $table->foreign('produk_id')->references('id')->on('produks')
                ->onUpdate('cascade') ->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('detiltransaksis', function(Blueprint $table) {
            $table->dropForeign('detiltransaksis_transaksi_id_foreign');
        });
   
        Schema::table('detiltransaksis', function(Blueprint $table) {
            $table->dropIndex('detiltransaksis_transaksi_id_foreign');
        });

        Schema::table('detiltransaksis', function(Blueprint $table) {
            $table->dropForeign('detiltransaksis_produk_id_foreign');
        });
   
        Schema::table('detiltransaksi', function(Blueprint $table) {
            $table->dropIndex('detiltransaksis_produk_id_foreign');
        });
       
        Schema::dropIfExists('detiltransaksis');

    }

};