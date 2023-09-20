<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\BarangayOfficialsStaffController;
use App\Http\Controllers\Backend\BarangayResidentsController;
use App\Http\Controllers\Backend\BarangayCertificatesController;
use App\Http\Controllers\Backend\BarangayClearancesController;
use App\Http\Controllers\Backend\BarangayBlotterRecordsController;
use App\Http\Controllers\Backend\BarangayAttendanceRecordsController;
use App\Http\Controllers\Backend\BarangayAnnouncementsController;
use App\Http\Controllers\Backend\BarangayRevenuesController;

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

 Route::get('/project/about', [AdminController::class, 'About'])->name('project.about');

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

    // Barangay certificates type all route
    Route::controller(BarangayCertificatesController::class)->group(function(){

        Route::get('/barangay/certificates', 'Certificates')->name('barangay.certificates');

        Route::get('/barangay/barangaycertificate', 'BarangayCertificate')->name('barangay.certificate');

    });

    // Barangay clearances type all route
    Route::controller(BarangayClearancesController::class)->group(function(){

        Route::get('/barangay/clearances', 'Clearances')->name('barangay.clearances');

        Route::get('/barangay/barangayclearance', 'BarangayClearance')->name('barangay.clearance');
        
    });

    // Barangay blotter records type all route
    Route::controller(BarangayBlotterRecordsController::class)->group(function(){

    Route::get('/barangay/blotterrecords', 'BlotterRecords')->name('barangay.blotter.records');

    Route::get('/create/blotterrecord', 'CreateBlotterRecord')->name('create.blotter.record');

    Route::post('/store/blotterrecord', 'StoreBlotterRecord')->name('store.blotter.record');

    Route::get('/edit/blotterrecord/{id}', 'EditBlotterRecord')->name('edit.blotter.record');

    Route::post('/update/blotterrecord', 'UpdateBlotterRecord')->name('update.blotter.record');

    Route::get('/delete/blotterrecord/{id}', 'DeleteBlotterRecord')->name('delete.blotter.record');

    Route::get('/view/blotterrecord/{id}', 'ViewBlotterRecord')->name('view.blotter.record');
    
    });

    // Barangay attendance records type all route
    Route::controller(BarangayAttendanceRecordsController::class)->group(function(){

    Route::get('/barangay/attendancerecords', 'AttendanceRecords')->name('barangay.attendance.records');

    Route::get('/create/attendancerecord', 'CreateAttendanceRecord')->name('create.attendance.record');

    Route::post('/store/attendancerecord', 'StoreAttendanceRecord')->name('store.attendance.record');

    Route::get('/edit/attendancerecord/{id}', 'EditAttendanceRecord')->name('edit.attendance.record');

    Route::post('/update/attendancerecord', 'UpdateAttendanceRecord')->name('update.attendance.record');

    Route::get('/delete/attendancerecord/{id}', 'DeleteAttendanceRecord')->name('delete.attendance.record');

    Route::get('/view/attendancerecord/{id}', 'ViewAttendanceRecord')->name('view.attendance.record');

    });

    // Barangay announcements type all route
    Route::controller(BarangayAnnouncementsController::class)->group(function(){

    Route::get('/barangay/announcements', 'Announcements')->name('barangay.announcements');
    
    });

    // Barangay revenues type all route
    Route::controller(BarangayRevenuesController::class)->group(function(){

    Route::get('/barangay/revenues', 'Revenues')->name('barangay.revenues');
    
    });




    

    

    

}); // End group admin middleware




