<?php

namespace App\Filament\Widgets;

use App\Models\Patient;
use App\Models\Service;
use App\Models\Doctor;
use App\Models\Appointment;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DashboardStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Patients', Patient::count())
                ->description('Nombre de patients')
                ->color('success'),

            Stat::make('Services', Service::count())
                ->description('Nombre de services')
                ->color('primary'),

            Stat::make('Docteurs', Doctor::count())
                ->description('Nombre de docteurs')
                ->color('warning'),

            Stat::make('Rendez-vous', Appointment::count())
                ->description('Nombre de rendez-vous')
                ->color('info'),
        ];
    }
}
