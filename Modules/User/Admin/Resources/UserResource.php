<?php

namespace Modules\User\Admin\Resources;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Modules\Filament\Traits\CleanResourceDetails;
use Modules\User\Admin\Resources\UserResource\Pages;
use Modules\User\Entities\User;

class UserResource extends Resource
{
    use CleanResourceDetails;

    protected static ?string $model = User::class;
    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $recordTitleAttribute = 'full_name';
    protected static ?string $slug = 'users';

    /**
     * Detail Fetcher Key
     *
     * @var string $key
     */
    private static string $key = 'user';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()->columns()->schema([
                    Forms\Components\TextInput::make('full_name')->required(),
                    Forms\Components\TextInput::make('email')->email()->unique()->required(),
                    Forms\Components\TextInput::make('password')->required()->confirmed('password_confirmation')->password()->hiddenOn('edit'),
                    Forms\Components\TextInput::make('password_confirmation')->password()->hiddenOn('edit'),
                ]),
            ]);
    }

    protected function getTableQuery(): Builder
    {
        return User::query()->latest();
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->label(__('user::table.id'))->sortable(),
                TextColumn::make('full_name')->label(__('user::table.name'))->searchable()->sortable(),
                TextColumn::make('email')->label(__('user::table.email'))->searchable()->sortable(),
                TextColumn::make('created_at')->label(__('user::table.created_at'))->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
