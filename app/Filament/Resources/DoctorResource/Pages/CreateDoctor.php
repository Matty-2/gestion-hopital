<?php

namespace App\Filament\Resources\DoctorResource\Pages;

use App\Filament\Resources\DoctorResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateDoctor extends CreateRecord
{
    protected static string $resource = DoctorResource::class;
    protected function getRedirectUrl(): string
    {
        // Rediriger vers la page de visualisation du docteur après la création
        return $this->getResource()::getUrl('index');
    }

}
