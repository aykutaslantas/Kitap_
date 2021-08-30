<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Kitaplartablo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kitaplartablo', function (Blueprint $table) {
            $table->id();
            $table->string('kitap_adi',60)->nullable();
            $table->string('kitap_yazari',50)->nullable();
            $table->string('kitap_resmi',60)->nullable();
            $table->string('kitap_isbn_no',30)->nullable();
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
        Schema::dropIfExists('kitaplartablo');
    }
}
