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
        Schema::create('breach_events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('identity_id')->constrained('identities')->restrictOnDelete();
            $table->string('source');
            $table->date('reported_on');
            $table->enum('severity', ['L', 'M', 'H', 'C'])->default('L')->comment('L:Low, M:Medium, H:High, C:Critical'); // Default Low
            $table->enum('status', ['R', 'U'])->default('U')->comment('R:Resolved, U:Unresolved'); // Default Unresolved
            $table->string('endpoint');
            $table->text('details')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('breach_events', function (Blueprint $table) {
            $table->dropForeign(['identity_id']);
        });
        Schema::dropIfExists('breach_events');
    }
};
