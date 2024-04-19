<?php

use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VehicleController;
use App\Models\Vehicle;
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

Route::get('/', function () {
    return view('auth.login');
});


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('vehicles', VehicleController::class);
    Route::resource('drivers', DriverController::class);
    Route::resource('bookings', BookingController::class);

    route::get('/approval', [ApprovalController::class, 'index'])->name('approval.index');
    route::get('/approval/{id}/edit', [ApprovalController::class, 'edit'])->name('approval.edit');
    route::put('/approval/{id}/Manager', [ApprovalController::class, 'updateManager'])->name('approval.updateManager');
    route::put('/approval/{id}/staff', [ApprovalController::class, 'updateStaff'])->name('approval.updateStaff');

    route::get('/approved', [ApprovalController::class, 'approved'])->name('approval.approved');

    route::get('/export', [ApprovalController::class, 'allExport'])->name('approval.export');
    route::get('/exportByYear', [ApprovalController::class, 'exportByYear'])->name('approval.exportByYear');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
