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
        Schema::create('absensis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pegawai_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();  // Bisa kosong
            $table->string('nama');
            $table->timestamp('tanggal')->nullable();
            $table->enum('statuskehadiran',['hadir','sakit','izin','absen']);
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
        Schema::table('absensis',function(Blueprint $table){
            $table->foreign('pegawai_id')->references('id')->on('pegawais')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')
            ->onUpdate('cascade')->onDelete('cascade');
           
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('absensis', function(Blueprint $table) {
            $table->dropForeign('absensis_pegawai_id_foreign');
        });

        Schema::table('absensis', function(Blueprint $table) {
            $table->dropIndex('absensis_pegawai_id_foreign');
        });

        Schema::table('absensis', function(Blueprint $table) {
            $table->dropForeign('absensis_user_id_foreign');
        });

        Schema::table('absensis', function(Blueprint $table) {
            $table->dropIndex('absensis_user_id_foreign');
        });
       
        
              
        Schema::dropIfExists('absensis');
    }
};
    
