<?php

use App\Http\Controllers\AgentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PolicyTypeController;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\PolicyLimitController;
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

//Policy Types
Route::get('/policytypes',  [PolicyTypeController::class, 'index'])->name('policytypes');
Route::get('/policytypes_create',  [PolicyTypeController::class, 'create'])->name('policytypes_create');
Route::post('/policytypes_save',  [PolicyTypeController::class, 'store'])->name('policytypes_save');

//Policies
Route::get('/policies',  [PolicyController::class, 'index'])->name('policies');
Route::get('/policy_create',  [PolicyController::class, 'create'])->name('policy_create');
Route::post('/policy_save',  [PolicyController::class, 'store'])->name('policy_save');

//Policy Limits
Route::get('/policylimits',  [PolicyLimitController::class, 'index'])->name('policylimits');
Route::get('/policylimits_create',  [PolicyLimitController::class, 'create'])->name('policylimits_create');
Route::post('/policylimits_save',  [PolicyLimitController::class, 'store'])->name('policylimits_save');


//Agent Certificate
Route::get('/cert_first_step',  [AgentController::class, 'choosePolicyTypes'])->name('cert_first_step');
Route::post('/cert_2nd_step',  [AgentController::class, 'create'])->name('cert_2nd_step');




require __DIR__.'/auth.php';
