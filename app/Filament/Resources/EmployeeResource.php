<?php

namespace App\Filament\Resources;

use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Select;
use App\Filament\Resources\EmployeeResource\Pages;
use App\Filament\Resources\EmployeeResource\RelationManagers;
use App\Models\Employee;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EmployeeResource extends Resource
{
    protected static ?string $model = Employee::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    







    // Ce label sera utilisé pour afficher le nom de la ressource en singulier
    protected static ?string $label = 'Employé ';

    // Ce label sera utilisé pour afficher le nom de la ressource en pluriel
    protected static ?string $pluralLabel = 'Employées ';

    // Ce label sera utilisé dans la navigation du tableau de bord
    protected static ?string $navigationLabel = 'Employées ';
    








    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nom')->required(),
                Forms\Components\TextInput::make('prenom')->required(),
                Forms\Components\Select::make('sexe')
                ->options([
                    'male' => 'Male',
                    'female' => 'Female',
                ])->required(),
                Forms\Components\TextInput::make('email')->required(),
                Forms\Components\TextInput::make('telephone')->required(),
                Select::make('service_id')
                ->label('Service')
                ->relationship('service', 'nom') // Assurez-vous que cette relation est définie
                ->required() ->searchable()->required(),
               
                Forms\Components\Select::make('role')
                ->options([
                    'docteur' => 'Docteur',
                    'infimiere' => 'Infimiere',
                    'econome'   => 'Econome',
                    'directeur' => 'Directeur'
                ]) ->searchable()->required()


                
            ]);
    }
   
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
           
                TextColumn::make('nom')->searchable(),
                TextColumn::make('prenom')->searchable(),
                TextColumn::make('sexe'),
                TextColumn::make('email')->searchable(),
                TextColumn::make('telephone')->searchable(),

                TextColumn::make('service.nom') // Utilisez 'service.name' pour afficher le nom
                ->label('Service')
                ->sortable()
                ->searchable(),
                Tables\Columns\TagsColumn::make('role'),
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEmployees::route('/'),
            'create' => Pages\CreateEmployee::route('/create'),
            'edit' => Pages\EditEmployee::route('/{record}/edit'),
        ];
    }
}
