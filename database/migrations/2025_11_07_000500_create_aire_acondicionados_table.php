<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('aire_acondicionados', function (Blueprint $table) {
            $table->id();
            $table->foreignId('aula_id')->constrained('aulas')->onDelete('cascade');
            $table->string('modo');           // Frío, Calor, Ventilación, etc.
            $table->integer('temperatura');   // grados Celsius
            $table->string('estado');         // Encendido / Apagado
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('aire_acondicionados');
    }
};
