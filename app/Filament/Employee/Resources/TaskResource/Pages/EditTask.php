<?php

namespace App\Filament\Employee\Resources\TaskResource\Pages;

use App\Filament\Employee\Resources\TaskResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Filament\Notifications\Notification;
use App\Models\Project;
use App\Models\User;
use App\Models\TaskStatus;

class EditTask extends EditRecord
{
    protected static string $resource = TaskResource::class;
    protected static ?string $model = \App\Models\Task::class;


    protected function handleRecordUpdate(Model $record, array $data): Model
{
    $record->update($data);
 
    //$record =  static::getModel()::update($data);
        Log::info($record);

        $employeeId = $record['employee_id'];
        $projectId = $record['project_id'];
        $taskname = $record['name'];
        $taskstatus = $record['status_id'];

        // Get project name (assuming you have a Project model)
        $project = Project::find($projectId);
        $projectName = $project ? $project->name : 'Unknown Project';  // Handle case where project not found

        // Notification logic
        $project_man_user = User::find($project->pm_id); // points to a user ID of project manager
        $employee_user = User::find($employeeId); // points to a user ID of employee
        $task_status = TaskStatus::find($taskstatus); // points to the task status id for this task in the table

        // logic to send notification to project manager
        if ($project_man_user) {
            $project_man_user->notify(
                Notification::make()
                    ->title('Task Status changed!')
                    ->body("The task ". $taskname ." for project '" . $projectName . "' assigned to ". $employee_user->name." ". $employee_user->second_name ." has its status updated to ". $task_status->name .".")
                    ->toDatabase()
            );
            Log::info('user exists and notification was sent successfully');
        } else {
            Log::info('user doesnt exist');
        }

        return $record;
}

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
