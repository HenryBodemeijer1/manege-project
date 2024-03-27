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
        Schema::create('opmerkingen', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('opmerking');
            $table->foreignId('lessen_id')
                ->references('id')
                ->on('lessen')
                ->onDelete('cascade');
            $table->foreignId('user_id')
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
        Schema::dropIfExists('opmerkingen');
    }
};
