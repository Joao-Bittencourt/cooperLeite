<?php

use App\Models\Produto;
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
        Schema::create('estoque_movimentacaos', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Produto::class);
            $table->string('operacao', 2);
            $table->decimal('qtd', 10, 3);
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estoque_movimentacaos');
    }
};
