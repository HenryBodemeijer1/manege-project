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
        Schema::create('lessen', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('lesdoel');
            $table->string('onderwerp');
            $table->dateTime('datetime');
            $table->foreignId('instructeur_id')
                ->references('id')
                ->on('Users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lessens');
    }
};
