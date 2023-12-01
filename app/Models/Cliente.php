<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Cliente extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public array $tipoPessoaOptions = [
        'F' => 'Pessoa Fisica',
        'J' => 'Pessoa juridica'
    ];

    public array $papelOptions = [
        'C' => 'Cliente',
        'F' => 'Fornecedor',
        'I' => 'Funcionario' // Interno
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
}
