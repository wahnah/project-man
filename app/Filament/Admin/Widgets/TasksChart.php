<?php

namespace App\Filament\Admin\Widgets;
use App\Models\Project;
use Filament\Forms\Components\DatePicker;
use Illuminate\Support\Carbon;
use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;

class TasksChart extends ApexChartWidget
{
    /**
     * Chart Id
     *
     * @var string
     */
    protected static ?string $chartId = 'tasksChart';

    /**
     * Widget Title
     *
     * @var string|null
     */
    protected static ?string $heading = 'Project Completetion Comparison';

    protected function getFormSchema(): array
    {
        return [
            DatePicker::make('date_start')
                ->default(now()->subMonth()),
            DatePicker::make('date_end')
                ->default(now()),
        ];
    }

    /**
     * Chart options (series, labels, types, size, animations...)
     * https://apexcharts.com/docs/options
     *
     * @return array
     */
    protected function getOptions(): array
    {
        $startDate = Carbon::parse($this->filterFormData['date_start']);
  $endDate = Carbon::parse($this->filterFormData['date_end']);
        return [
            'chart' => [
                'type' => 'donut',
                'height' => 300,
            ],
            'series' => [ Project::whereRelation(
                'status',
                'name',
                \App\Models\ProjectStatus::FINISHED
            )->where('finish_date', '>=', $startDate)
            ->where('finish_date', '<=', $endDate)
            ->count(),
             Project::whereRelation(
                'status',
                'name',
                \App\Models\ProjectStatus::IN_PROGRESS
            )->where('start_date', '>=', $startDate)
            ->where('finish_date', '<=', $endDate) // Assuming 'end_date' is your finish date attribute
            ->count()],
            'labels' => ['Finished Projects','In Progress Projects'],
            'legend' => [
                'labels' => [
                    'fontFamily' => 'inherit',
                ],
            ],
        ];
    }
}
