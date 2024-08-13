<?php

namespace App\Filament\Resources;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use App\Filament\Resources\DoctorResource\Pages;
use App\Filament\Resources\DoctorResource\RelationManagers;
use App\Models\Doctor;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use PhpParser\Node\Stmt\Label;


class DoctorResource extends Resource
{
    protected static ?string $model = Doctor::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';



    // Ce label sera utilisé pour afficher le nom de la ressource en singulier
    protected static ?string $label = 'Docteur ';

    // Ce label sera utilisé pour afficher le nom de la ressource en pluriel
    protected static ?string $pluralLabel = 'Docteurs ';

    // Ce label sera utilisé dans la navigation du tableau de bord
    protected static ?string $navigationLabel = 'Docteurs ';
    










    
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                
                
                TextInput::make('nom')
                    ->label('Nom du Docteur')
                    ->required(),


                // Ajoutez le champ de sélection pour les services
                Select::make('service_id')
                ->label('Service')
                ->relationship('service', 'nom') // Assurez-vous que cette relation est définie
                ->required()
                ->searchable(),


                
                FileUpload::make('image')->columnSpanFull()
                ->label('Photo du Docteur')
                ->required(),

            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('nom')
                ->label('Nom du Docteur')
                ->sortable()
                ->searchable(),

                Tables\Columns\ImageColumn::make('image')
                ->label('Image du Docteur')
                ->sortable()
               ,

            TextColumn::make('service.nom') // Utilisez 'service.name' pour afficher le nom
                ->label('Service')
                ->sortable()
                ->searchable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDoctors::route('/'),
            'create' => Pages\CreateDoctor::route('/create'),
            'edit' => Pages\EditDoctor::route('/{record}/edit'),
        ];
    }
}