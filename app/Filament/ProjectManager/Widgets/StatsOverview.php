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
        $user = auth()->user();

        return [
            Stat::make('My Projects', \App\Models\Project::where('pm_id', $user->id)->count()),
            Stat::make(
                'Finished Projects',

                $finishedProjects = \App\Models\Project::where('pm_id', $user->id)
            ->whereHas('status', function ($query) {
                $query->where('name', \App\Models\ProjectStatus::FINISHED);
            })
            ->count()
            ),
            Stat::make(
                'Projects In-Progress',

                $inprogressProjects = \App\Models\Project::where('pm_id', $user->id)
                ->whereHas('status', function ($query) {
                    $query->where('name', \App\Models\ProjectStatus::IN_PROGRESS);
                })
                ->count()
            ),

        ];
    }
}
