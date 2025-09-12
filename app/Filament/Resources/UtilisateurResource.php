<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UtilisateurResource\Pages;
use App\Filament\Resources\UtilisateurResource\RelationManagers;
use App\Models\Utilisateur;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UtilisateurResource extends Resource
{
    protected static ?string $model = Utilisateur::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Utilisateur';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('prenom')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nom')
                    ->required()
                    ->maxLength(255),
                 Forms\Components\Select::make('sexe')
                    ->options([
                        'Masculin' => 'Masculin',
                        'Feminin' => 'Feminin',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('adresse')
                   ->required()
                   ->maxLength(255),
                Forms\Components\TextInput::make('ville')
                   ->required()
                   ->maxLength(255),
                Forms\Components\TextInput::make('pays')
                   ->required()
                   ->maxLength(255),
                   Forms\Components\TextInput::make('telephone')
                   ->required()
                   ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->unique(ignoreRecord: true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->sortable(),
                Tables\Columns\TextColumn::make('prenom')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('nom')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('sexe')->sortable(),
                Tables\Columns\TextColumn::make('adresse')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('ville')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('pays')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('telephone')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('email')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('created_at')->dateTime(),
            ])
            ->filters([
             //
            ])
            ->actions([
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
            'index' => Pages\ListUtilisateurs::route('/'),
            'create' => Pages\CreateUtilisateur::route('/create'),
            'edit' => Pages\EditUtilisateur::route('/{record}/edit'),
        ];
    }
}
