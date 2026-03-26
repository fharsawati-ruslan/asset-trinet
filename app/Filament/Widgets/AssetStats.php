<?php

namespace App\Filament\Widgets;

use App\Models\Asset;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class AssetStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [

            Stat::make('Server', Asset::where('sub_kategori', 'server')->count())
            ->icon('heroicon-o-server')
            ->extraAttributes(['class' => '!bg-red-100']),

        Stat::make('Router', Asset::where('sub_kategori', 'router')->count())
            ->icon('heroicon-o-wifi')
            ->extraAttributes(['class' => '!bg-blue-100']),

        Stat::make('Switch', Asset::where('sub_kategori', 'switch')->count())
            ->icon('heroicon-o-squares-2x2')
            ->extraAttributes(['class' => '!bg-yellow-100']),

        Stat::make('Access Point', Asset::where('sub_kategori', 'access_point')->count())
            ->icon('heroicon-o-signal')
            ->extraAttributes(['class' => '!bg-green-100']),

        Stat::make('Laptop', Asset::where('sub_kategori', 'laptop')->count())
            ->icon('heroicon-o-computer-desktop')
            ->extraAttributes(['class' => '!bg-indigo-100']),

        Stat::make('PC', Asset::where('sub_kategori', 'pc')->count())
            ->icon('heroicon-o-computer-desktop')
            ->extraAttributes(['class' => '!bg-gray-200']),

        Stat::make('Printer', Asset::where('sub_kategori', 'printer')->count())
            ->icon('heroicon-o-printer')
            ->extraAttributes(['class' => '!bg-orange-100']),

        Stat::make('Scanner', Asset::where('sub_kategori', 'scanner')->count())
            ->icon('heroicon-o-document')
            ->extraAttributes(['class' => '!bg-cyan-100']),

        Stat::make('CCTV', Asset::where('sub_kategori', 'cctv')->count())
            ->icon('heroicon-o-video-camera')
            ->extraAttributes(['class' => '!bg-red-200']),

        Stat::make('Proyektor', Asset::where('sub_kategori', 'proyektor')->count())
            ->icon('heroicon-o-presentation-chart-line')
            ->extraAttributes(['class' => '!bg-green-200']),

        Stat::make('Elektronik', Asset::where('kategori', 'it')->count())
            ->icon('heroicon-o-bolt')
            ->extraAttributes(['class' => '!bg-purple-100']),

        Stat::make('Furnitur', Asset::where('kategori', 'furnitur')->count())
            ->icon('heroicon-o-home')
            ->extraAttributes(['class' => '!bg-yellow-200']),

        Stat::make('ATK', Asset::where('kategori', 'other')->count())
            ->icon('heroicon-o-pencil')
            ->extraAttributes(['class' => '!bg-gray-300']),

        ];
    }
}