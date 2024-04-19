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
        Schema::table('photos', function (Blueprint $table) {
            // Cek apakah kolom likes sudah ada sebelum menambahkannya
            if (!Schema::hasColumn('photos', 'likes')) {
                $table->integer('likes');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Untuk tujuan rollback, tidak perlu melakukan apa pun karena kolom sudah diperiksa sebelumnya
    }
};
