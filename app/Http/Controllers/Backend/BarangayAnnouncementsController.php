<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\BarangayAnnouncements;

use App\Models\BarangayAttendanceRecords;
use App\Models\BarangayBlotterRecords;
use App\Models\BarangayCertificates;
use App\Models\BarangayClearances;
use App\Models\BarangayOfficials;
use App\Models\BarangayResidents;

class BarangayAnnouncementsController extends Controller
{
    public function Announcements(){

        $announcements = BarangayAnnouncements::latest()->get();
        return view('backend.barangay.barangay_announcements', compact('announcements'));

    } // End Method

}
