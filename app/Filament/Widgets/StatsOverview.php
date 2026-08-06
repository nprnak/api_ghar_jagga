<?php

namespace App\Filament\Widgets;

use App\Models\Inquiry;
use App\Models\Post;
use App\Models\Project;
use App\Models\Service;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Services', Service::query()->count())
                ->description('Total services')
                ->icon('heroicon-o-wrench-screwdriver'),
            Stat::make('Projects', Project::query()->count())
                ->description('Total projects')
                ->icon('heroicon-o-building-office-2'),
            Stat::make('Posts', Post::query()->count())
                ->description('News & blogs')
                ->icon('heroicon-o-newspaper'),
            Stat::make('New Inquiries', Inquiry::query()->where('status', 'new')->count())
                ->description('Awaiting response')
                ->icon('heroicon-o-inbox'),
        ];
    }
}
