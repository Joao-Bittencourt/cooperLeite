<?php

namespace App\Filament\App\Resources\EstoqueMovimentacaoResource\Pages;

use App\Filament\App\Resources\EstoqueMovimentacaoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEstoqueMovimentacao extends EditRecord
{
    protected static string $resource = EstoqueMovimentacaoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
