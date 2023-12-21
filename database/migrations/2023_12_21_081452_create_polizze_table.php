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
        Schema::create('polizze', function (Blueprint $table) {
            $table->id();
            $table->string('numero_polizza');
            $table->float('premio');
            $table->date('decorezza_polizza');
            $table->date('scadenza_prima_rata');
            $table->date('scadenza_polizza');
            $table->enum('periodicità', ['annuale', 'semestrale', 'trimestrale'])->default('annuale');
            $table->unsignedBigInteger('assicurazione_id');

            $table->foreign('assicurazione_id')
                  ->references('id')->on('assicurazioni')
                  ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('polizze');
    }
};
