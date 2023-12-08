<?php

namespace App\Filament\App\Resources;

use App\Filament\App\Resources\EstoqueMovimentacaoResource\Pages;
use App\Models\EstoqueMovimentacao;
use App\Status;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class EstoqueMovimentacaoResource extends Resource
{
    protected static ?string $model = EstoqueMovimentacao::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        $estoqueMovimentacao = new EstoqueMovimentacao();

        return $form
            ->schema([
                Forms\Components\Select::make('produto_id')
                    ->relationship('produto', 'nome')
                    ->required(),
                Forms\Components\Select::make('operacao')
                    ->label('Operação')
                    ->options($estoqueMovimentacao->getOperacoes())
                    ->required(),
                Forms\Components\TextInput::make('qtd')
                    ->required()
                    ->numeric(),
                Forms\Components\Select::make('status')
                    ->options((new Status())->getOptions())
                    ->required()
                    ->default(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        $estoqueMovimentacao = new EstoqueMovimentacao();

        return $table
            ->columns([
                Tables\Columns\TextColumn::make('produto.nome')
                    ->label('Produto')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('operacao')
                    ->label('Operação')
                    ->formatStateUsing(fn (string $state): string => $estoqueMovimentacao->getOperacao($state))
                    ->searchable(),
                Tables\Columns\TextColumn::make('qtd')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->formatStateUsing(fn (string $state): string => (new Status())->getOption($state))
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ]);
        // ->bulkActions([
        //     Tables\Actions\BulkActionGroup::make([
        //         Tables\Actions\DeleteBulkAction::make(),
        //     ]),
        // ])
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEstoqueMovimentacaos::route('/'),
            'create' => Pages\CreateEstoqueMovimentacao::route('/create'),
            'edit' => Pages\EditEstoqueMovimentacao::route('/{record}/edit'),
        ];
    }

    public static function canDelete(Model $record): bool
    {
        return false;
    }
}
