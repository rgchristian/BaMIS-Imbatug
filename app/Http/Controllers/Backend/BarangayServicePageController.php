<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Load the models
use App\Models\BarangayOfficials;
use App\Models\BarangayAnnouncements;

//Load the controllers
use App\Http\Controllers\Backend\BarangayOfficialsStaffController;
use App\Http\Controllers\Backend\BarangayAnnouncementsController;

class BarangayServicePageController extends Controller
{
    // public function FetchToServicePage() {

    //     $service_barangay_officials = BarangayOfficials::latest()->get();
    //     $service_barangay_announcements = BarangayAnnouncements::latest()->get();

    //     return view('frontend.service', compact('service_barangay_officials', 'service_barangay_announcements'));
        
    // }
}
