<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacanciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacancies', function (Blueprint $table) {
            $table->id();
            $table->string('ticket');
            $table->string('idPerusahaan');
            $table->string('title');
            $table->string('bidang');
            $table->string('subbidang');
            $table->string('gajimin');
            $table->string('gajimax');
            $table->string('type');
            $table->string('daerah');
            $table->string('expired');
            $table->string('slot');
            $table->longText('description');
            $table->enum('status', ['active', 'closed']);
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
        Schema::dropIfExists('vacancies');
    }
}
