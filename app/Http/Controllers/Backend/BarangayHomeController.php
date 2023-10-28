<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Load the models
use App\Models\BarangayOfficials;
use App\Models\BarangayResidents;
use App\Models\BarangayAnnouncements;

//Load the controllers
use App\Http\Controllers\Backend\BarangayResidentsController;
use App\Http\Controllers\Backend\BarangayOfficialsStaffController;
use App\Http\Controllers\Backend\BarangayAnnouncementsController;

class BarangayHomeController extends Controller {

    public function FetchToHome() {

        $home_barangay_officials = BarangayOfficials::latest()->get();
        $residentsCount = BarangayResidents::count();
        $officialsCount = BarangayOfficials::count();
        $home_barangay_announcements = BarangayAnnouncements::latest()->get();

        return view('frontend.master', compact('home_barangay_officials', 'residentsCount', 'officialsCount', 'home_barangay_announcements'));
        
    }

}
