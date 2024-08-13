<?php

namespace App\Filament\Resources\AppointmentResource\Pages;

use App\Filament\Resources\AppointmentResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAppointment extends CreateRecord
{
    protected static string $resource = AppointmentResource::class;
    protected function getRedirectUrl(): string
    {
        // Rediriger vers la page de visualisation rendez-vous
        return $this->getResource()::getUrl('index');
    }
}
