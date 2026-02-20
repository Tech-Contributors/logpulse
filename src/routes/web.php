<?php

use Illuminate\Support\Facades\Route;
use TechContributors\LogPulse\Http\Controllers\LogPulseViewerController;

$viewer = config('log-pulse.viewer', []);

Route::middleware($viewer['middleware'] ?? ['web'])
    ->prefix(trim($viewer['prefix'] ?? '', '/'))
    ->group(function () {

        Route::get('audit-logs', [LogPulseViewerController::class, 'index'])
            ->name('audit-logs.index');

    });