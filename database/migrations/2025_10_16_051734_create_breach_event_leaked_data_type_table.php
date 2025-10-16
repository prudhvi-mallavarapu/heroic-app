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
        Schema::create('breach_event_leaked_data_type', function (Blueprint $table) {
            $table->id();
            $table->foreignId('breach_event_id')->constrained('breach_events')->cascadeOnDelete();
            $table->foreignId('leaked_data_type_id')->constrained('leaked_data_types')->cascadeOnDelete();
            $table->timestamps();

            $table->unique(['breach_event_id', 'leaked_data_type_id'], 'breach_event_type_unique'); //prevent duplicates
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('breach_event_leaked_data_type');
    }
};
