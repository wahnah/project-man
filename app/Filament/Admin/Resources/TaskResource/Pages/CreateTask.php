<?php

namespace App\Filament\Admin\Resources\TaskResource\Pages;

use App\Filament\Admin\Resources\TaskResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Filament\Notifications\Notification;
use App\Models\Project;
use App\Models\User;

class CreateTask extends CreateRecord
{
    protected static string $resource = TaskResource::class;
    protected static ?string $model = \App\Models\Team::class;


    protected function mutateFormDataBeforeCreate(array $data): array
{

    // Retrieve the project model instance 
    $project = Project::find($data['project_id']);

    if (!strtotime($data['start_date']) || strtotime($data['start_date']) < strtotime($project->start_date) || strtotime($data['start_date']) > strtotime($project->finish_date)) {
        Notification::make()
            ->title('Failed to create task')
            ->body('Make sure the dates set for task fail between projuct start and finish dates')
            ->danger() 
            ->send();
        //throw new \Exception('Task start date is outside the project dates');
        $this->halt();
    }
    
    if (!strtotime($data['finish_date']) || strtotime($data['finish_date']) < strtotime($project->start_date) || strtotime($data['finish_date']) > strtotime($project->finish_date)) {
        Notification::make()
            ->title('Failed to create task')
            ->body('Make sure the dates set for task fail between projuct start and finish dates')
            ->danger() 
            ->send();
        //throw new \Exception('Task finish date is outside the project dates');
        $this->halt();
    }

    
    return $data;
}

    protected function handleRecordCreation(array $data): Model
    {
        $record =  static::getModel()::create($data);
        Log::info($record);

        $employeeId = $data['employee_id'];
        $projectId = $data['project_id'];

        // Get project name (assuming you have a Project model)
        $project = Project::find($projectId);
        $projectName = $project ? $project->name : 'Unknown Project';  // Handle case where project not found

        // Notification logic
        $user = User::find($employeeId); // Assuming employee_id points to a user ID

        if ($user) {
            $user->notify(
                Notification::make()
                    ->title('Task Assigned!')
                    ->body("A new task for project '" . $projectName . "' has been assigned to you.")
                    ->toDatabase()
            );
            Log::info('user exists and notification was sent successfully');
        } else {
            Log::info('user doesnt exist');
        }

        return $record;
    }

    protected function getRedirectUrl(): string
{
    return $this->getResource()::getUrl('index');
}
}
