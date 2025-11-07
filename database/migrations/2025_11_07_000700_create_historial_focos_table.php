<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('historial_focos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('foco_id')->constrained('focos')->onDelete('cascade');
            $table->string('accion');
            $table->string('usuario')->nullable();
            $table->timestamp('fecha_hora');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('historial_focos');
    }
};
