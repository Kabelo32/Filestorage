<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HRDocumentsController;
use App\Http\Controllers\AssetsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Human Resource Documents Routes
Route::get('/HumanResource', [HRDocumentsController::class, 'index'])
        ->name('HumanResource.dashboard');

Route::get('/HumanResource/condition-appraisal', [HRDocumentsController::class, 'conditionAppraisal'])
        ->name('HumanResource.conditionAppraisal');
    
Route::post('/HumanResource/condition-appraisal/upload', [HRDocumentsController::class, 'uploadConditionAppraisal'])
        ->name('HumanResource.conditionAppraisal.upload');

// Job Profile Documents

Route::get('/HumanResource/jobprofile', [HRDocumentsController::class, 'jobProfile'])
        ->name('HumanResource.jobProfile');
    
Route::post('/HumanResource/jobprofile/upload', [HRDocumentsController::class, 'uploadjobProfile'])
        ->name('HumanResource.jobProfile.upload');
    


// Leave Form Documents

Route::get('/HumanResource/leaveForm', [HRDocumentsController::class, 'leaveForm'])
        ->name('HumanResource.leaveForm');
    
Route::post('/HumanResource/leaveform/upload', [HRDocumentsController::class, 'uploadleaveForm'])
        ->name('HumanResource.leaveForm.upload');
    

// Overtime Documents

Route::get('/HumanResource/overTime', [HRDocumentsController::class, 'overTime'])
        ->name('HumanResource.overTime');
    
Route::post('/HumanResource/overTime/upload', [HRDocumentsController::class, 'uploadoverTime'])
        ->name('HumanResource.overTime.upload');
    
// Modify your routes to include the type
Route::delete('/human-resource/{type}/{id}', [HRDocumentsController::class, 'delete'])
        ->name('HumanResource.delete');

// Overtime Documents

Route::get('/HumanResource/advancedRequest', [HRDocumentsController::class, 'advancedRequest'])
        ->name('HumanResource.advancedRequest');
    
Route::post('/HumanResource/advancedRequest/upload', [HRDocumentsController::class, 'uploadadvancedRequest'])
        ->name('HumanResource.advancedRequest.upload');

// perfomance Appraisal

Route::get('/HumanResource/perfomanceAppraisal', [HRDocumentsController::class, 'perfomanceappraisal'])
        ->name('HumanResource.perfomanceAppraisal');
    
Route::post('/HumanResource/perfomanceAppraisal/upload', [HRDocumentsController::class, 'uploadperfomanceappraisal'])
        ->name('HumanResource.perfomanceAppraisal.upload');

// Assets Documents
Route::get('/Assets', [AssetsController::class, 'index'])
        ->name('Asset.dashboard');
        
Route::get('/Assets/laptop', [AssetsController::class, 'laptop'])
        ->name('Asset.laptop');
    
Route::post('/Assets/laptop/upload', [AssetsController::class, 'uploadlaptop'])
        ->name('Asset.laptop.upload');

Route::delete('/Assets/{type}/{id}', [AssetsController::class, 'delete'])
        ->name('Asset.delete');

Route::get('/Assets/cellphone', [AssetsController::class, 'cellphone'])
        ->name('Asset.cellPhone');
    
Route::post('/Assets/cellphone/upload', [AssetsController::class, 'uploadcellphone'])
        ->name('Asset.cellPhone.upload');
require __DIR__.'/auth.php';
