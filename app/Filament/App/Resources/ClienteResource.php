<?php

namespace App\Filament\App\Resources;

use App\Filament\App\Resources\ClienteResource\Pages;
use App\Models\Cliente;
use App\Status;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ClienteResource extends Resource
{
    protected static ?string $model = Cliente::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        $cliente = new Cliente();

        return $form
            ->schema([
                Forms\Components\TextInput::make('nome')
                    ->required(),
                Forms\Components\Select::make('tipo_pessoa')
                    ->options($cliente->getTipoPessoas())
                    ->required(),
                Forms\Components\Select::make('papel')
                    ->options($cliente->getPapeis())
                    ->required(),
                Forms\Components\Select::make('status')
                    ->options((new Status())->getOptions())
                    ->required()
                    ->default(1),
            ]);
    }

    public static function table(Table $table): Table
    {

        $cliente = new Cliente();

        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nome')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tipo_pessoa')
                    ->formatStateUsing(fn (string $state): string => $cliente->getTipoPessoa($state))
                    ->searchable(),
                Tables\Columns\TextColumn::make('papel')
                    ->formatStateUsing(fn (string $state): string => $cliente->getPapel($state))
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->formatStateUsing(fn (string $state): string => (new Status())->getOption($state))
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dt Cadastro')
                    ->dateTime('d/m/Y h:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Dt Modificação')
                    ->dateTime('d/m/Y h:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListClientes::route('/'),
            'create' => Pages\CreateCliente::route('/create'),
            'edit' => Pages\EditCliente::route('/{record}/edit'),
        ];
    }
}
