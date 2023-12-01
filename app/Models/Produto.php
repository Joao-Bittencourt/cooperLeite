<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Produto extends Model
{
    use HasFactory;

    protected $guarded = ['updated_at'];

    protected $fillable = [
        'id',
        'nome',
        'descricao',
        'unidade',
        'status',
        'created_at'
    ];
   

    public function estoque_movimentacaos(): HasMany
    {
        return $this->hasMany(EstoqueMovimentacao::class);
    }
}
