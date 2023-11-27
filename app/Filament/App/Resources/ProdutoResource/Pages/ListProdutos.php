<?php

namespace App\Filament\App\Resources\ProdutoResource\Pages;

use App\Filament\App\Resources\ProdutoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProdutos extends ListRecords
{
    protected static string $resource = ProdutoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
