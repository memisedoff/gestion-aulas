<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('cortinas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('aula_id')->constrained('aulas')->onDelete('cascade');
            $table->string('estado');
            $table->integer('posicion')->nullable(); // porcentaje de apertura
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cortinas');
    }
};
