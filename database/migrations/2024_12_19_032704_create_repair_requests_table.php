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
        Schema::create('repair_requests', function (Blueprint $table) {
            $table->id();
            $table->string('problem');
            $table->date('repair_date');
            $table->foreignId('user_id')
                ->cascadeOnUpdate()
                ->nullOnDelete()
                ->nullable()
                ->constrained();
            $table->foreignId('car_id')
                ->cascadeOnUpdate()
                ->nullOnDelete()
                ->nullable()
                ->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('repair_requests');
    }
};
