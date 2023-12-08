<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Symfony\Component\Translation\Exception\NotFoundResourceException;

class Cliente extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public array $tipoPessoas = [
        'F' => 'Pessoa Fisica',
        'J' => 'Pessoa juridica',
    ];

    public array $papeis = [
        'C' => 'Cliente',
        'F' => 'Fornecedor',
        'I' => 'Funcionario', // Interno
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function funcionario(): HasOne
    {
        return $this->hasOne(Funcionario::class);
    }

    public function pessoaFisica(): HasOne
    {
        return $this->hasOne(PessoaFisica::class);
    }

    public function pessoaJuridica(): HasOne
    {
        return $this->hasOne(PessoaJuridica::class);
    }

    public function getTipoPessoa(?string $tipoPessoa): string
    {

        if (empty($this->tipoPessoas[$tipoPessoa])) {
            throw new NotFoundResourceException("Not found operacao : {$tipoPessoa}");
        }

        return $this->tipoPessoas[$tipoPessoa];
    }

    public function getTipoPessoas(): array
    {
        return $this->tipoPessoas;
    }

    public function getPapel(?string $papel): string
    {

        if (empty($this->papeis[$papel])) {
            throw new NotFoundResourceException("Not found operacao : {$papel}");
        }

        return $this->papeis[$papel];
    }

    public function getPapeis(): array
    {
        return $this->papeis;
    }
}
