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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('naam');
            $table->string('email')->unique();
            $table->string("password")->default('0000');
            $table->string('role')->default('leerling');
            $table->string('adres');
            $table->string('woonplaats');
            $table->date('geboortedatum');
            $table->boolean('ziek');
            $table->integer('tegoed');
            $table->boolean('actief');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
