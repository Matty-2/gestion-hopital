<?php
namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Models\Service;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\FileUpload;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                
                Forms\Components\TextInput::make('nom')
                    ->required()
                    ->maxLength(255),
              
                
                   
                    Forms\Components\TextInput::make('description')
                    ->required()
                    ->maxLength(1000),

                    FileUpload::make('image')->columnSpanFull()
                    ->label('Photo du Service')
                    ->required(),

                    
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nom')->label('Nom du service')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('description')->label('Description')->sortable()->searchable(),
                
                Tables\Columns\ImageColumn::make('image')
                ->label('Image du service')
                ->sortable()
                
            ])
            ->filters([
                //
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }
}
