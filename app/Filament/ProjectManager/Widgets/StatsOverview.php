<?php

namespace App\Filament\ProjectManager\Widgets;

use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $projects = auth()->user()->projects->unique();
        $tasks = auth()->user()->tasks;

        return [
            Stat::make('My Projects', $projects->count()),
            Stat::make(
                'Finished Projects',

                $projects->filter(function ($project) {
                    return $project->status->name ==
                        \App\Models\ProjectStatus::FINISHED;
                })->count()
            ),
            Stat::make(
                'Projects In-Progress',
                $projects->filter(function ($project) {
                    return $project->status->name ==
                        \App\Models\ProjectStatus::IN_PROGRESS;
                })->count()
            ),

            Stat::make('My Tasks', $tasks->count()),
            Stat::make(
                'Finished Tasks',

                $tasks->filter(function ($task) {
                    return $task->status->name ==
                        \App\Models\TaskStatus::FINISHED;
                })->count()
            ),
            Stat::make(
                'Tasks In-Progress',
                $tasks->filter(function ($task) {
                    return $task->status->name ==
                        \App\Models\TaskStatus::IN_PROGRESS;
                })->count()
            ),
        ];
    }
}
