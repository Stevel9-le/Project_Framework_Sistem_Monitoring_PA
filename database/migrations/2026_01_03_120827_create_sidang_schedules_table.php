<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('sidang_schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained()->cascadeOnDelete();
            $table->enum('type', ['proposal', 'hasil', 'sidang_akhir']);
            $table->dateTime('scheduled_at');
            $table->string('room')->nullable();
            $table->enum('status', ['scheduled', 'completed', 'cancelled'])
                  ->default('scheduled');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sidang_schedules');
    }
};
