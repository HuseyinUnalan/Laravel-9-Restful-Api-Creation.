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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('categoryIds');
            $table->string('time');
            $table->double('star');
            $table->string('title');
            $table->string('video')->nullable();
            $table->string('director');
            $table->integer('active')->default(1)->comment('1: aktif, 0: pasif');
            $table->integer('isHome')->default(0)->comment('0 ise anasayfada gösterme, 1 ise anasayfada göster.');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
