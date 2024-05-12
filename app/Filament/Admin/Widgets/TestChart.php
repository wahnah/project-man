<?php

namespace App\Filament\Admin\Widgets;

use Filament\Widgets\ChartWidget;
use Filament\Support\RawJs;
use App\Models\Project;

class TestChart extends ChartWidget
{
    protected static ?string $heading = 'Project Completeion Comparison';


    protected function getData(): array
{
    return [
        'labels' => ['Finished Projects','In Progress Projects'],
        'datasets' => [
            [
                'label' => 'My Dataset',
                'data' => [Project::whereRelation(
                    'status',
                    'name',
                    \App\Models\ProjectStatus::FINISHED
                )->count(), Project::whereRelation(
                    'status',
                    'name',
                    \App\Models\ProjectStatus::IN_PROGRESS
                )->count()],
                'backgroundColor' => [
                    'green',
                    'red',
                ],
            ],
        ],
    ];
}


protected function getOptions(): RawJs
{
    return RawJs::make(<<<JS
        {
            scales: {
                y: {
                    // Hide the y-axis line
                    lines: {
                        display: false
                    },
                    // Optionally hide y-axis ticks (labels) as well
                    ticks: {
                        display: false  // Uncomment to hide ticks
                    }
                },
                x: {
                    // Hide the y-axis line
                    gridLines: {
                        display: false
                    },
                    // Optionally hide y-axis ticks (labels) as well
                    ticks: {
                        display: false  // Uncomment to hide ticks
                    }
                },
            },
        }
    JS);
}


    protected function getType(): string
    {
        return 'doughnut';
    }
}
