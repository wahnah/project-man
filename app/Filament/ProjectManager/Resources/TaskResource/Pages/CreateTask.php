<?php

namespace App\Filament\ProjectManager\Resources\TaskResource\Pages;

use App\Filament\ProjectManager\Resources\TaskResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTask extends CreateRecord
{
    protected static string $resource = TaskResource::class;
}
