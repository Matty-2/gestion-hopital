<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Filament\Navigation\NavigationItem;
use Illuminate\Support\ServiceProvider;
use App\Filament\Widgets\DashboardStats;



class FilamentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function boot(): void
    {
        Filament::serving(function () {
            // Enregistrement du widget de statistiques
            Filament::registerWidgets([
                DashboardStats::class,
            ]);

            // Ajout d'un élément de navigation
            Filament::registerNavigationItems([
                NavigationItem::make('Accueil Hôpital')
                    ->url('/') // Remplacez '/' par l'URL de votre page d'accueil
                    ->icon('heroicon-o-home') // Choisissez une icône appropriée
                    ->sort(1),
            ]);
        });
    }
}
