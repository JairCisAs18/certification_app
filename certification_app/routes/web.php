<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\HRController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SharedController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function (){
    return view('welcome');
})->name('main');

Route::get('/admin', function(){
    return view('admin');
})->name('adminView')->middleware('role:Administrator');

Route::get('/human-resources', function(){
    return view('hr');
})->name('hrView')->middleware('role:Human Resources');

Route::get('/operators', [SharedController::class, 'getOperators'])->name('operatorsView');
Route::get('/operators/add', [SharedController::class, 'addOperatorView'])->name('addOperatorView');
Route::post('/operators/add-operator', [SharedController::class, 'addOperator'])->name('addOperator');
Route::get('/operators/edit-operator/{id}', [SharedController::class, 'editOperatorView'])->name('editOperatorView');
Route::get('/operators/change-to-inactive/{id}', [SharedController::class, 'changeToInactive'])->name('changeToInactive');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
