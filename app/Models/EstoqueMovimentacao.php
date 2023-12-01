<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EstoqueMovimentacao extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = [
        'produto_id',
        'operacao',
        'qtd',
        'status',
        'created_at',
        'updated_at'
    ];

    public array $operacaoOptions = [
        'E' => 'Entrada',
        'S' => 'Saida'
    ];

    public function produto(): BelongsTo
    {
        return $this->belongsTo(Produto::class);
    }
}
