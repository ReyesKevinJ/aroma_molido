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
        Schema::create('contact', function (Blueprint $table) {
             $table->id();
            $table->string('nombre');
            $table->string('email');
            $table->string('telefono');
            $table->string('asunto');
            $table->string('mensaje');
            // false = no leído | true = leído
            $table->boolean('estado')->default(false);
            // created_at 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact');
    }
};
