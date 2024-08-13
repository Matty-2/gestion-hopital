<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AppointmentResource\Pages;
use App\Models\Appointment;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class AppointmentResource extends Resource
{
   

    protected static ?string $navigationIcon = 'heroicon-o-calendar';

    // Ce label sera utilisé pour afficher le nom de la ressource en singulier
    protected static ?string $label = 'Rendez-vous';

    // Ce label sera utilisé pour afficher le nom de la ressource en pluriel
    protected static ?string $pluralLabel = 'Rendez-vous';

    // Ce label sera utilisé dans la navigation du tableau de bord
    protected static ?string $navigationLabel = 'Rendez-vous';
    
    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Select::make('patient_id')
                    ->label('Patient')
                    ->relationship('patient', 'nom')
                    ->required()
                    ->searchable(),

                Select::make('service_id')
                    ->label('Service')
                    ->relationship('service', 'nom')
                    ->required()
                    ->searchable(),

                Select::make('doctor_id')
                    ->label('Docteur')
                    ->relationship('doctor', 'nom')
                    ->required()
                    ->searchable(),

                DatePicker::make('date')
                    ->label('Date du Rendez-vous')
                    ->required(),

                TimePicker::make('time')
                    ->label('Heure du Rendez-vous')
                    ->required()
                    ->placeholder('HH:MM'),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('patient.nom')
                    ->label('Patient')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('service.nom')
                    ->label('Service')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('doctor.nom')
                    ->label('Docteur')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('date')
                    ->label('Date du Rendez-vous')
                    ->sortable(),

                TextColumn::make('time')
                    ->label('Heure du Rendez-vous'),
            ])
            ->filters([
                // Ajouter des filtres si nécessaire
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // Définir les relations si nécessaire
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAppointments::route('/'),
            'create' => Pages\CreateAppointment::route('/create'),
            'edit' => Pages\EditAppointment::route('/{record}/edit'),
        ];
    }
}
