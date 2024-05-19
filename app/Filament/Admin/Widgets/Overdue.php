<?php

namespace App\Filament\Admin\Widgets;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Carbon\Carbon;

class Overdue extends BaseWidget
{
    protected static ?string $heading = 'Overdue Projects';
    public function table(Table $table): Table
    {
        $today = now();
        return $table
            ->query(\App\Models\Project::query()->where('finish_date', '<', $today)
            ->where('status_id', 2
        ))
            ->columns([
                \Filament\Tables\Columns\TextColumn::make('name')
                    ->wrap(),

                \Filament\Tables\Columns\TextColumn::make('pm.full_name')
                    ->label('Project Manager')
                    ->badge()
                    ->color(function (string $state): string {
                        return 'success';
                    }),



                \Filament\Tables\Columns\TextColumn::make('status.name')
                    ->label('Status')
                    ->badge()
                    ->color(function (string $state): string {
                        return 'info';
                    }),


                \Filament\Tables\Columns\TextColumn::make('finish_date')
                    ->label('Finish date')
                    ->date(),
            ])

            ->actions([
                Tables\Actions\ViewAction::make(),

            ])
            ->recordAction(null)
            ->recordUrl(null);
    }
}
