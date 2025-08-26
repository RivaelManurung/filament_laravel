<?php

namespace App\Filament\Widgets;

use App\Models\Post;
use Carbon\Carbon;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class GrafikPost extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Postingan', Post::count())
                ->description('Jumlah semua Postingan'),
            Stat::make('Total jumlah yang diPublikasikan', Post::where('is_published', true)->count())
                ->description('Jumlah semua Postingan yang diPublikasikan'),
            Stat::make('Total jumlah Postingan hari ini ', Post::whereDate('created_at', Carbon::today())->count())
                ->description('Jumlah semua Postingan yang dibuat hari ini'),
            Stat::make(
                'Total jumlah Postingan minggu ini',
                Post::whereBetween('created_at', [
                    Carbon::now()->startOfWeek(),
                    Carbon::now()->endOfWeek()
                ])->count()
            )
                ->description('Jumlah semua Postingan yang dibuat minggu ini'),
            Stat::make('Total jumlah Postingan bulan ini', Post::whereMonth('created_at', Carbon::now()->month)->count())
                ->description('Jumlah semua Postingan yang dibuat bulan ini'),
        ];
    }
}
