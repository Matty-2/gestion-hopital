<?php


namespace App\Filament\Resources;

use App\Filament\Resources\PatientResource\Pages;
use App\Models\Patient;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;

class PatientResource extends Resource
{
    protected static ?string $model = Patient::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nom')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('prenom')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('date_de_naissance')
                    ->required(),
                Forms\Components\Select::make('sexe')
                    ->options([
                        'male' => 'Male',
                        'female' => 'Female',
                    ])
                    ->required(),
                    Forms\Components\TextInput::make('lieu_de_naissance')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('addresse')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('telephone')
                    ->required()
                    ->maxLength(15),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nom')->label('Nom')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('prenom')->label('Prenom')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('date_de_naissance')->label('Date de naissance')->sortable(),
                Tables\Columns\TextColumn::make('sexe')->label('Sexe')->sortable(),
                Tables\Columns\TextColumn::make('lieu_de_naissance')->label('Lieu de naissance')->sortable(),
                Tables\Columns\TextColumn::make('addresse')->label('Addresse')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('telephone')->label('Telephone')->sortable(),
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
            'index' => Pages\ListPatients::route('/'),
            'create' => Pages\CreatePatient::route('/create'),
            'edit' => Pages\EditPatient::route('/{record}/edit'),
        ];
    }
}
