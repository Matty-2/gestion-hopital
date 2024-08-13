<?php

namespace App\Filament\Resources\ServiceResource\Pages;

use App\Filament\Resources\ServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateService extends CreateRecord
{
    protected static string $resource = ServiceResource::class;


    protected function getRedirectUrl(): string
    {
        // Rediriger vers la page de visualisation du service après la création
        return $this->getResource()::getUrl('index');
    }

}
