<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profils', function (Blueprint $table) {
            $table->id();
            // datadiri
            $table->string('idUser');
            $table->longText('description');
            $table->string('Ttl');
            $table->string('alamat');
            $table->string('Agama');
            $table->string('kelamin');
            // Kontak
            $table->string('email');
            $table->string('telp');
            $table->string('social1');
            $table->string('social2');
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
        Schema::dropIfExists('profils');
    }
}
