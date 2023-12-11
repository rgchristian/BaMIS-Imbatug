<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Controller for the system user
use App\Http\Controllers\AdminController;

//
use App\Http\Controllers\HomeController;

// Controller for the system content
use App\Http\Controllers\Backend\BarangayOfficialsStaffController;
use App\Http\Controllers\Backend\BarangayResidentsController;
use App\Http\Controllers\Backend\BarangayCertificatesController;
use App\Http\Controllers\Backend\BarangayClearancesController;
use App\Http\Controllers\Backend\BarangayBlotterRecordsController;
use App\Http\Controllers\Backend\BarangayAttendanceRecordsController;
use App\Http\Controllers\Backend\BarangayAnnouncementsController;
use App\Http\Controllers\Backend\BarangayRevenuesController;

// Controller to fetch data from admin into landing page
use App\Http\Controllers\Backend\BarangayHomeController;

// Controller to fetch data from admin into admin dashboard
use App\Http\Controllers\Backend\BarangayAdminController;

// Controller to fetch data from admin into barangay official page
use App\Http\Controllers\Backend\BarangayOfficialPageController;

//
use App\Http\Controllers\Backend\BarangayAboutPageController;

//
use App\Http\Controllers\Backend\BarangayServicePageController;

//
use App\Http\Controllers\Backend\BarangayContactPageController;

// wala naman ata niay pulos
use App\Http\Controllers\Backend\BarangayAllPageViewerController;

use App\Http\Controllers\Backend\AnnouncementsController;


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
    return view('frontend.master');
});

Route::get('/dashboard', function () {
    return view('admin.admin_dashboard');
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

 Route::get('/calendar', [AdminController::class, 'Calendar'])->name('calendar');

}); // End group admin middleware

//Landing page type all route
Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');


//Landing page type all route walay pulos
// Route::get('/barangay/contact', [BarangayContactPageController::class, 'BarangayContact'])->name('barangay.contact');

Route::get('/barangay/home', [BarangayAllPageViewerController::class, 'BarangayHome'])->name('barangay.home');

Route::get('/barangay/about', [BarangayAllPageViewerController::class, 'BarangayAbout'])->name('barangay.about');

Route::get('/barangay/service', [BarangayAllPageViewerController::class, 'BarangayService'])->name('barangay.service');

Route::get('/barangay/contact', [BarangayAllPageViewerController::class, 'BarangayContact'])->name('barangay.contact');

Route::get('/officials', [BarangayAllPageViewerController::class, 'BarangayOfficials'])->name('officials');

Route::get('/announcements', [BarangayAllPageViewerController::class, 'BarangayAnnouncements'])->name('announcements');

Route::get('/barangay/appointment', [BarangayAllPageViewerController::class, 'BarangayAppointment'])->name('barangay.appointment');

Route::get('/barangay/features', [BarangayAllPageViewerController::class, 'BarangayFeatures'])->name('barangay.features');


//
// Route::get('/announcements', [AnnouncementsController::class, 'BarangayAnnouncements'])->name('announcements');



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

        Route::get('/view/official/{id}', 'ViewOfficial')->name('view.official');

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

        // Mark as done
        Route::post('/blotter-record/{id}/mark-as-done', 'MarkBlotterRecordAsDone')->name('mark.blotter.record.as.done');

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

        Route::get('/create/announcement', 'CreateAnnouncement')->name('create.announcement');

        Route::post('/store/announcement', 'StoreAnnouncement')->name('store.announcement');
    
    });

    // Barangay revenues type all route
    Route::controller(BarangayRevenuesController::class)->group(function(){

        Route::get('/barangay/revenues', 'Revenues')->name('barangay.revenues');
    
    });

    // Fetch data to admin dashboard 
    Route::controller(BarangayAdminController::class)->group(function(){

        Route::get('/admin/dashboard', 'FetchToDashbard')->name('admin.dashboard');

        Route::get('/male/residents', 'TotalMale')->name('total.male.residents');

        Route::get('/view/male/resident/{id}', 'ViewMaleResident')->name('view.male.resident');

        Route::get('/edit/male/resident/{id}', 'EditMaleResident')->name('edit.male.resident');

        Route::post('/update/male/resident/{id}', 'UpdateMaleResident')->name('update.male.resident');

        Route::get('/delete/male/resident/{id}', 'DeleteMaleResident')->name('delete.male.resident');

        Route::get('/female/residents', 'TotalFemale')->name('total.female.residents');

        Route::get('/view/female/resident/{id}', 'ViewFemaleResident')->name('view.female.resident');

        Route::get('/edit/female/resident/{id}', 'EditFemaleResident')->name('edit.female.resident');

        Route::post('/update/female/resident/{id}', 'UpdateFemaleResident')->name('update.female.resident');

        Route::get('/delete/female/resident/{id}', 'DeleteFemaleResident')->name('delete.female.resident');

        Route::get('/pwd/residents', 'TotalPWD')->name('total.pwd.residents');

        Route::get('/view/pwd/resident/{id}', 'ViewPWDResident')->name('view.pwd.resident');

        Route::get('/edit/pwd/resident/{id}', 'EditPWDResident')->name('edit.pwd.resident');

        Route::post('/update/pwd/resident/{id}', 'UpdatePWDResident')->name('update.pwd.resident');

        Route::get('/delete/pwd/resident/{id}', 'DeletePWDResident')->name('delete.pwd.resident');

        Route::get('/widow/residents', 'TotalSoloParent')->name('total.soloparent.residents');

        Route::get('/view/soloparent/resident/{id}', 'ViewSoloParentResident')->name('view.soloparent.resident');

        Route::get('/edit/soloparent/resident/{id}', 'EditSoloParentResident')->name('edit.soloparent.resident');

        Route::post('/update/soloparent/resident/{id}', 'UpdateSoloParentResident')->name('update.soloparent.resident');

        Route::get('/delete/soloparent/resident/{id}', 'DeleteSoloParentResident')->name('delete.soloparent.resident');

        Route::get('/registeredvoters/residents', 'TotalRegisteredVoters')->name('total.registeredvoters.residents');

        Route::get('/view/registeredvoter/resident/{id}', 'ViewRegisteredVoterResident')->name('view.registeredvoter.resident');

        Route::get('/edit/registeredvoter/resident/{id}', 'EditRegisteredVoterResident')->name('edit.registeredvoter.resident');

        Route::post('/update/registeredvoter/resident/{id}', 'UpdateRegisteredVoterResident')->name('update.registeredvoter.resident');

        Route::get('/delete/registeredvoter/resident/{id}', 'DeleteRegisteredVoterResident')->name('delete.registeredvoter.resident');

        Route::get('/purok', 'TotalPurok')->name('total.purok');

        Route::get('/purok/one', 'PurokOneResidents')->name('purok.one.residents');

        Route::get('/view/purok/one/{id}', 'ViewPurokOneResident')->name('view.purok.one.resident');

        Route::get('/edit/purok/one/{id}', 'EditPurokOneResident')->name('edit.purok.one.resident');

        Route::post('/update/purok/one/{id}', 'UpdatePurokOneResident')->name('update.purok.one.resident');

        Route::get('/delete/purok/one/{id}', 'DeletePurokOneResident')->name('delete.purok.one.resident');

        Route::get('/purok/two', 'PurokTwoResidents')->name('purok.two.residents');

        Route::get('/view/purok/two/{id}', 'ViewPurokTwoResident')->name('view.purok.two.resident');

        Route::get('/edit/purok/two/{id}', 'EditPurokTwoResident')->name('edit.purok.two.resident');

        Route::post('/update/purok/two/{id}', 'UpdatePurokTwoResident')->name('update.purok.two.resident');

        Route::get('/delete/purok/two/{id}', 'DeletePurokTwoResident')->name('delete.purok.two.resident');

        Route::get('/purok/three', 'PurokThreeResidents')->name('purok.three.residents');

        Route::get('/view/purok/three/{id}', 'ViewPurokThreeResident')->name('view.purok.three.resident');

        Route::get('/edit/purok/three/{id}', 'EditPurokThreeResident')->name('edit.purok.three.resident');

        Route::post('/update/purok/three/{id}', 'UpdatePurokThreeResident')->name('update.purok.three.resident');

        Route::get('/delete/purok/three/{id}', 'DeletePurokThreeResident')->name('delete.purok.three.resident');

        Route::get('/purok/four', 'PurokFourResidents')->name('purok.four.residents');

        Route::get('/view/purok/four/{id}', 'ViewPurokFourResident')->name('view.purok.four.resident');

        Route::get('/edit/purok/four/{id}', 'EditPurokFourResident')->name('edit.purok.four.resident');

        Route::post('/update/purok/four/{id}', 'UpdatePurokFourResident')->name('update.purok.four.resident');

        Route::get('/delete/purok/four/{id}', 'DeletePurokFourResident')->name('delete.purok.four.resident');

        Route::get('/purok/five', 'PurokFiveResidents')->name('purok.five.residents');

        Route::get('/view/purok/five/{id}', 'ViewPurokFiveResident')->name('view.purok.five.resident');

        Route::get('/edit/purok/five/{id}', 'EditPurokFiveResident')->name('edit.purok.five.resident');

        Route::post('/update/purok/five/{id}', 'UpdatePurokFiveResident')->name('update.purok.five.resident');

        Route::get('/delete/purok/five/{id}', 'DeletePurokFiveResident')->name('delete.purok.five.resident');

        Route::get('/purok/six', 'PurokSixResidents')->name('purok.six.residents');

        Route::get('/view/purok/six/{id}', 'ViewPurokSixResident')->name('view.purok.six.resident');

        Route::get('/edit/purok/six/{id}', 'EditPurokSixResident')->name('edit.purok.six.resident');

        Route::post('/update/purok/six/{id}', 'UpdatePurokSixResident')->name('update.purok.six.resident');

        Route::get('/delete/purok/six/{id}', 'DeletePurokSixResident')->name('delete.purok.six.resident');

        Route::get('/purok/seven', 'PurokSevenResidents')->name('purok.seven.residents');

        Route::get('/view/purok/seven/{id}', 'ViewPurokSevenResident')->name('view.purok.seven.resident');

        Route::get('/edit/purok/seven/{id}', 'EditPurokSevenResident')->name('edit.purok.seven.resident');

        Route::post('/update/purok/seven/{id}', 'UpdatePurokSevenResident')->name('update.purok.seven.resident');

        Route::get('/delete/purok/seven/{id}', 'DeletePurokSevenResident')->name('delete.purok.seven.resident');

        Route::get('/purok/eight', 'PurokEightResidents')->name('purok.eight.residents');

        Route::get('/view/purok/eight/{id}', 'ViewPurokEightResident')->name('view.purok.eight.resident');

        Route::get('/edit/purok/eight/{id}', 'EditPurokEightResident')->name('edit.purok.eight.resident');

        Route::post('/update/purok/eight/{id}', 'UpdatePurokEightResident')->name('update.purok.eight.resident');

        Route::get('/delete/purok/eight/{id}', 'DeletePurokEightResident')->name('delete.purok.eight.resident');

        Route::get('/purok/nine', 'PurokNineResidents')->name('purok.nine.residents');

        Route::get('/view/purok/nine/{id}', 'ViewPurokNineResident')->name('view.purok.nine.resident');

        Route::get('/edit/purok/nine/{id}', 'EditPurokNineResident')->name('edit.purok.nine.resident');

        Route::post('/update/purok/nine/{id}', 'UpdatePurokNineResident')->name('update.purok.nine.resident');

        Route::get('/delete/purok/nine/{id}', 'DeletePurokNineResident')->name('delete.purok.nine.resident');

        Route::get('/ethnicity', 'TotalEthnicity')->name('total.ethnicity');

        Route::get('/ethnicity/Talaandig', 'TalaandigResidents')->name('talaandig.residents');

        Route::get('/view/talaandig/resident/{id}', 'ViewTalaandigResident')->name('view.talaandig.resident');

        Route::get('/edit/talaandig/resident/{id}', 'EditTalaandigResident')->name('edit.talaandig.resident');

        Route::post('/update/talaandig/resident/{id}', 'UpdateTalaandigResident')->name('update.talaandig.resident');

        Route::get('/delete/talaandig/resident/{id}', 'DeleteTalaandigResident')->name('delete.talaandig.resident');

        Route::get('/ethnicity/Higaonon', 'HigaononResidents')->name('higaonon.residents');

        Route::get('/view/higaonon/resident/{id}', 'ViewHigaononResident')->name('view.higaonon.resident');

        Route::get('/edit/higaonon/resident/{id}', 'EditHigaononResident')->name('edit.higaonon.resident');

        Route::post('/update/higaonon/resident/{id}', 'UpdateHigaononResident')->name('update.higaonon.resident');

        Route::get('/delete/higaonon/resident/{id}', 'DeleteHigaononResident')->name('delete.higaonon.resident');

        Route::get('/ethnicity/Bukidnon', 'BukidnonResidents')->name('bukidnon.residents');

        Route::get('/view/bukidnon/resident/{id}', 'ViewBukidnonResident')->name('view.bukidnon.resident');

        Route::get('/edit/bukidnon/resident/{id}', 'EditBukidnonResident')->name('edit.bukidnon.resident');

        Route::post('/update/bukidnon/resident/{id}', 'UpdateBukidnonResident')->name('update.bukidnon.resident');

        Route::get('/delete/bukidnon/resident/{id}', 'DeleteBukidnonResident')->name('delete.bukidnon.resident');

        Route::get('/ethnicity/Umayamnon', 'UmayamnonResidents')->name('umayamnon.residents');

        Route::get('/view/umayamnon/resident/{id}', 'ViewUmayamnonResident')->name('view.umayamnon.resident');

        Route::get('/edit/umayamnon/resident/{id}', 'EditUmayamnonResident')->name('edit.umayamnon.resident');

        Route::post('/update/umayamnon/resident/{id}', 'UpdateUmayamnonResident')->name('update.umayamnon.resident');

        Route::get('/delete/umayamnon/resident/{id}', 'DeleteUmayamnonResident')->name('delete.umayamnon.resident');

        Route::get('/ethnicity/Matigsalug', 'MatigsalugResidents')->name('matigsalug.residents');

        Route::get('/view/matigsalug/resident/{id}', 'ViewMatigsalugResident')->name('view.matigsalug.resident');

        Route::get('/edit/matigsalug/resident/{id}', 'EditMatigsalugResident')->name('edit.matigsalug.resident');

        Route::post('/update/matigsalug/resident/{id}', 'UpdateMatigsalugResident')->name('update.matigsalug.resident');

        Route::get('/delete/matigsalug/resident/{id}', 'DeleteMatigsalugResident')->name('delete.matigsalug.resident');

        Route::get('/ethnicity/Manobo', 'ManoboResidents')->name('manobo.residents');

        Route::get('/view/manobo/resident/{id}', 'ViewManoboResident')->name('view.manobo.resident');

        Route::get('/edit/manobo/resident/{id}', 'EditManoboResident')->name('edit.manobo.resident');

        Route::post('/update/manobo/resident/{id}', 'UpdateManoboResident')->name('update.manobo.resident');

        Route::get('/delete/manobo/resident/{id}', 'DeleteManoboResident')->name('delete.manobo.resident');

        Route::get('/ethnicity/Tigwahanon', 'TigwahanonResidents')->name('tigwahanon.residents');

        Route::get('/view/tigwahanon/resident/{id}', 'ViewTigwahanonResident')->name('view.tigwahanon.resident');

        Route::get('/edit/tigwahanon/resident/{id}', 'EditTigwahanonResident')->name('edit.tigwahanon.resident');

        Route::post('/update/tigwahanon/resident/{id}', 'UpdateTigwahanonResident')->name('update.tigwahanon.resident');

        Route::get('/delete/tigwahanon/resident/{id}', 'DeleteTigwahanonResident')->name('delete.tigwahanon.resident');

    });

    // Fetch data to landing page
    // Route::get('/barangay/home', [BarangayHomeController::class, 'FetchToHome'])->name('barangay.home');

    // Route::get('/officials', [BarangayOfficialPageController::class, 'FetchToOfficialPage'])->name('officials');

    // Route::get('/barangay/about', [BarangayAboutPageController::class, 'FetchToAboutPage'])->name('barangay.about');

    // Route::get('/barangay/service', [BarangayServicePageController::class, 'FetchToServicePage'])->name('barangay.service');

    

}); // End group admin middleware