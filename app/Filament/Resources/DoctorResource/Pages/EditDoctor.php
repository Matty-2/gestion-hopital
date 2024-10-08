<?php

namespace App\Filament\Resources\DoctorResource\Pages;

use App\Filament\Resources\DoctorResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDoctor extends EditRecord
{
    protected static string $resource = DoctorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            
        ];
        
    }

    protected function getRedirectUrl(): string
    {
        // Rediriger vers la page de visualisation rendez-vous
        return $this->getResource()::getUrl('index');
    }


}
