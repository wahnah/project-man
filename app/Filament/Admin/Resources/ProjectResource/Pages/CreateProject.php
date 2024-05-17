<?php

namespace App\Filament\Admin\Resources\ProjectResource\Pages;

use App\Filament\Admin\Resources\ProjectResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Filament\Notifications\Notification;

class CreateProject extends CreateRecord
{
    protected static string $resource = ProjectResource::class;
    protected static ?string $model = \App\Models\Project::class;

    protected function handleRecordCreation(array $data): Model
    {
        $record =  static::getModel()::create($data);
        Log::info($record);

        $projectmanId = $data['pm_id'];
        

        // Get project name (assuming you have a Project model)
        $projectName = $data['name'];

        // Notification logic
        $user = User::find($projectmanId); // Assuming employee_id points to a user ID

        if ($user) {
            $user->notify(
                Notification::make()
                    ->title('Project Manager Role Assigned!')
                    ->body("The project manager role for project '" . $projectName . "' has been assigned to you.")
                    ->toDatabase()
            );
            Log::info('user exists and notification was sent successfully');
        } else {
            Log::info('user doesnt exist');
        }

        return $record;
    }
}
