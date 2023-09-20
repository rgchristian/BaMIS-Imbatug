<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\BarangayRevenues;

use App\Models\BarangayAnnouncements;
use App\Models\BarangayAttendanceRecords;
use App\Models\BarangayBlotterRecords;
use App\Models\BarangayCertificates;
use App\Models\BarangayClearances;
use App\Models\BarangayOfficials;
use App\Models\BarangayResidents;



class BarangayRevenuesController extends Controller
{
    public function Revenues(){

        $revenues = BarangayRevenues::latest()->get();
        return view('backend.barangay.barangay_revenues', compact('revenues'));

    } // End Method
}
