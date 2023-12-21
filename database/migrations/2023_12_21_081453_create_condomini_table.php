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
        Schema::create('condomini', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->date('inizio_anno_condominiale');
            $table->date('fine_anno_condominiale');
            $table->date('scadenza_prima_rata');
            $table->date('scadenza_seconda_rata');
            $table->string('indirizzo');
            $table->string('codice_fiscale', 11);
            $table->unsignedBigInteger('polizza_id');

            $table->foreign('polizza_id')
                  ->references('id')->on('polizze')
                  ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('condomini');
    }
};
