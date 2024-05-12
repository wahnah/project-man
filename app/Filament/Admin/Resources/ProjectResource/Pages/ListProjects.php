<?php

namespace App\Filament\Admin\Resources\ProjectResource\Pages;

use App\Filament\Admin\Resources\ProjectResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\ListRecords\Tab;

class ListProjects extends ListRecords
{
    protected static string $resource = ProjectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array{
        return [
            'All' => Tab::make(),
            'In Progress' => Tab::make()->modifyQUeryUsing(function ($query){
                $query->where('status_id', 2);
            }),
            'Finished' => Tab::make()->modifyQUeryUsing(function ($query){
                $query->where('status_id', 1);
            }),
        ];
    }
}
