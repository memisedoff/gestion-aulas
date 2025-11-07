<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('historial_aires', function (Blueprint $table) {
            $table->id();
            $table->foreignId('aire_id')->constrained('aire_acondicionados')->onDelete('cascade');
            $table->string('accion'); // ejemplo: Encender, Apagar, Cambiar modo
            $table->string('usuario')->nullable();
            $table->timestamp('fecha_hora');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('historial_aires');
    }
};
