<?php

use App\Models\Cliente;
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
        Schema::create('pessoa_fisicas', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Cliente::class);
            $table->string('nome_civil')->nullable();
            $table->dateTime('dt_nascimento')->nullable();
            $table->string('cpf', 14)->nullable();
            $table->string('rg', 14)->nullable();
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pessoa_fisicas');
    }
};
