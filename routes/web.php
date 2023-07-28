<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\BarangayOfficialsStaffController;
use App\Http\Controllers\Backend\BarangayResidentsController;

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

require __DIR__.'/auth.php';

// Admin group middleware
Route::middleware(['auth', 'role:admin'])->group(function(){

 Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');

 Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');

 Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');

 Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');

 Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');

 Route::post('/admin/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('admin.update.password');

}); // End group admin middleware

Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');

// Admin group middleware
Route::middleware(['auth', 'role:admin'])->group(function(){

    // Barangay officials type all route
    Route::controller(BarangayOfficialsStaffController::class)->group(function(){

        Route::get('/barangay/officials', 'Officials')->name('barangay.officials');

        Route::get('/add/official', 'AddOfficial')->name('add.official');

        Route::post('/store/official', 'StoreOfficial')->name('store.official');

        Route::get('/edit/official/{id}', 'EditOfficial')->name('edit.official');

        Route::post('/update/official', 'UpdateOfficial')->name('update.official');

        Route::get('/delete/official/{id}', 'DeleteOfficial')->name('delete.official');

    });

    // Barangay residents type all route
    Route::controller(BarangayResidentsController::class)->group(function(){

        Route::get('/barangay/residents', 'Residents')->name('barangay.residents');

        Route::get('/add/resident', 'AddResident')->name('add.resident');

        Route::post('/store/resident', 'StoreResident')->name('store.resident');

        Route::get('/edit/resident/{id}', 'EditResident')->name('edit.resident');

        Route::post('/update/resident', 'UpdateResident')->name('update.resident');

        Route::get('/delete/resident/{id}', 'DeleteResident')->name('delete.resident');

        Route::get('/view/resident/{id}', 'ViewResident')->name('view.resident');

    });



}); // End group admin middleware




