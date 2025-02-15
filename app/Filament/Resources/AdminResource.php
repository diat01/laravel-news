<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AdminResource\Pages;
use App\Models\Admin;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class AdminResource extends Resource
{
    protected static ?string $model = Admin::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make("name")->label(__("Name"))->required(),
                Forms\Components\Select::make('role')
                    ->options([
                        'superadmin'      => __("Admin"),
                        'content manager' => __("Content manager"),
                    ]),
                Forms\Components\TextInput::make("email")->label(__("Email"))->email()->unique("admins", "email", ignoreRecord: true)->required(),
                Forms\Components\TextInput::make("password")->label(__("Password"))->password()->revealable()->hiddenOn('edit')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make("name")->label(__("Name")),
                Tables\Columns\TextColumn::make("role")->label(__("Role")),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageAdmins::route('/'),
        ];
    }

    public static function canAccess(): bool
    {
        return auth()->user()?->role === "superadmin";
    }
}
