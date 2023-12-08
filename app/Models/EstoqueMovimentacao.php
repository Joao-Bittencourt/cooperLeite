<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Symfony\Component\Translation\Exception\NotFoundResourceException;

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
        'updated_at',
    ];

    public array $operacoes = [
        'E' => 'Entrada',
        'S' => 'Saida',
    ];

    public function produto(): BelongsTo
    {
        return $this->belongsTo(Produto::class);
    }

    public function getOperacao(?string $operacao): string
    {

        if (empty($this->operacoes[$operacao])) {
            throw new NotFoundResourceException("Not found operacao : {$operacao}");
        }

        return $this->operacoes[$operacao];
    }

    public function getOperacoes(): array
    {
        return $this->operacoes;
    }
}
