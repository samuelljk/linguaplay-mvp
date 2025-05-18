<?php

namespace App\Providers\Filament;

use Filament\Panel;
use Filament\PanelProvider;
use App\Filament\Resources\VideoResource;
use App\Filament\Resources\DiscussionResource;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('admin')
            ->default()
            ->path('admin')
            ->resources([
                VideoResource::class,
                DiscussionResource::class,
            ]);
    }
}
