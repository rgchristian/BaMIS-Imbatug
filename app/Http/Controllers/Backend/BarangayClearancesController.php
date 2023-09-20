<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\BarangayClearances;

use App\Models\BarangayAnnouncements;
use App\Models\BarangayAttendanceRecords;
use App\Models\BarangayBlotterRecords;
use App\Models\BarangayCertificates;
use App\Models\BarangayOfficials;
use App\Models\BarangayResidents;

class BarangayClearancesController extends Controller
{
    public function Clearances(){

        $clearances = BarangayClearances::latest()->get();
        return view('backend.barangay.barangay_clearances', compact('clearances'));

    } // End method

    public function BarangayClearance(){

        $barangay_clearance = BarangayClearances::latest()->get();
        return view('backend.barangay.barangay_clearance', compact('barangay_clearance'));

    } // End method
}
