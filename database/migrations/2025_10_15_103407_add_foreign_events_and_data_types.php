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
        Schema::table('breach_events', function (Blueprint $table) {
            $table->foreignId('data_type_id')
                ->after('details')
                ->constrained('leaked_data_types')
                ->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('breach_events', function (Blueprint $table) {
            $table->dropForeign(['data_type_id']);
            $table->dropColumn(['data_type_id']);
        });
    }
};
