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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('slug')->unique();

            $table->decimal('total_amount', 10, 2)->default(0);
            $table->decimal('shipping_cost', 10, 2)->default(0);

            $table->enum('status', [
                'pendiente',
                'procesando',
                'completado',
                'cancelado'
            ])->default('pendiente');

            $table->enum('payment_method', [
                'tarjeta',
                'efectivo',
                'transferencia'
            ])->default('tarjeta');

            $table->enum('payment_status', [
                'no pagado',
                'pagado',
                'fallido',
                'reembolsado'
            ])->default('no pagado');

            $table->timestamp('shipped_at')->nullable();
            $table->string('address');
            $table->string('city');
            $table->string('postal_code');

            $table->text('notes')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
