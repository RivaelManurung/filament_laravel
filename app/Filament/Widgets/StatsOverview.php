<?php

namespace App\Filament\Widgets;

use App\Models\Category;
use App\Models\Product;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            // Kartu Statistik #1: Total Produk
            Stat::make('Total Produk', Product::count())
                ->description('Jumlah semua produk di database')
                ->descriptionIcon('heroicon-m-shopping-bag')
                ->color('success'),

            // Kartu Statistik #2: Total Kategori
            Stat::make('Total Kategori', Category::count())
                ->description('Jumlah semua kategori produk')
                ->descriptionIcon('heroicon-m-tag')
                ->color('info'),

            // Kartu Statistik #3: Rata-rata Harga Produk
            Stat::make('Rata-rata Harga', 'Rp' . number_format(Product::avg('price'), 2))
                ->description('Rata-rata harga dari semua produk')
                ->descriptionIcon('heroicon-m-currency-dollar')
                ->color('warning'),
        ];
    }
}