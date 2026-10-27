<?php

namespace App\Filament\Widgets;

use App\Models\Book;
use Filament\Widgets\ChartWidget;

class BookStatusChartWidget extends ChartWidget
{
    protected static bool $isLazy = false;

    protected static ?string $heading = 'Books Available vs Borrowed';

    protected static ?int $sort = 2;

    protected static ?string $maxHeight = '280px';

    protected function getData(): array
    {
        $available = Book::where('status', 'available')->count();
        $borrowed = Book::where('status', 'borrowed')->count();

        return [
            'datasets' => [
                [
                    'label' => 'Total Books',
                    'data' => [$available, $borrowed],
                    'backgroundColor' => [
                        '#10B981', // green / emerald
                        '#F59E0B', // amber / orange
                    ],
                ],
            ],
            'labels' => ['Available', 'Borrowed'],
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
