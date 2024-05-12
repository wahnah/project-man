<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Project;
use App\Models\ProjectStatus;
use App\Models\Task;
use App\Models\Team;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('All Projects', Project::count()),
            Stat::make(
                'Finished Projects',
                Project::whereRelation(
                    'status',
                    'name',
                    \App\Models\ProjectStatus::FINISHED
                )->count()
            ),
            Stat::make(
                'Projects In-Progress',
                Project::whereRelation(
                    'status',
                    'name',
                    \App\Models\ProjectStatus::IN_PROGRESS
                )->count()
            ),

            Stat::make('All Tasks', Task::count()),
            Stat::make(
                'Finished Tasks',
                Task::whereRelation(
                    'status',
                    'name',
                    \App\Models\TaskStatus::FINISHED
                )->count()
            ),
            Stat::make(
                'Tasks In-Progress',
                Task::whereRelation(
                    'status',
                    'name',
                    \App\Models\TaskStatus::IN_PROGRESS
                )->count()
            ),

            Stat::make('Employees', User::count()),

            Stat::make('Teams', Team::count())

        ];
    }
}
