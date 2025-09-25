<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ApplicationStatusController;
use App\Http\Controllers\ApplicationStatusLogController;
use App\Http\Controllers\CommunicationLogController;
Route::get('/registrations', [RegistrationController::class, 'index'])->name('registrations.index');
Route::get('/registration/create', [RegistrationController::class, 'showForm'])->name('registrations.create');
Route::post('/registration/submit', [RegistrationController::class, 'submitForm'])->name('registrations.submit');

Route::get('/communication-logs', [CommunicationLogController::class, 'index'])
    ->name('communication_logs.index');

Route::get('/application-status-logs', [ApplicationStatusController::class, 'index'])->name('application_status_logs.index');


Route::get('/', function () {
    return view('welcome');
});


Route::get('/applications', [ApplicationController::class, 'webIndex'])->name('applications.index');
Route::get('/applications/create', [ApplicationController::class, 'webCreate'])->name('applications.create');
Route::post('/applications', [ApplicationController::class, 'webStore'])->name('applications.store');
Route::get('/applications/{id}/edit', [ApplicationController::class, 'webEdit'])->name('applications.edit');
Route::put('/applications/{id}', [ApplicationController::class, 'webUpdate'])->name('applications.update');
Route::delete('/applications/{id}', [ApplicationController::class, 'webDestroy'])->name('applications.destroy');

Route::post('/applications/{id}/status', [ApplicationStatusController::class, 'update'])->name('applications.status.update');
Route::post('/applications/{id}/send-reminder', [ApplicationController::class, 'sendReminder'])->name('applications.sendReminder');
Route::post('/applications/{id}/update-email', [ApplicationController::class, 'updateEmail'])->name('applications.updateEmail');


Route::get('/register', [RegistrationController::class, 'showForm'])->name('register.form');
Route::post('/register', [RegistrationController::class, 'submitForm'])->name('register.submit');
// Form đăng ký
Route::get('/registrations/create', [RegistrationController::class, 'showForm'])->name('register.form');
Route::post('/registrations', [RegistrationController::class, 'submitForm'])->name('register.submit');

