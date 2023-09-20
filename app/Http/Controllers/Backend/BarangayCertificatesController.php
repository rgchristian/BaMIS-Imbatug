<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\BarangayCertificates;

use App\Models\BarangayAnnouncements;
use App\Models\BarangayAttendanceRecords;
use App\Models\BarangayBlotterRecords;
use App\Models\BarangayClearances;
use App\Models\BarangayOfficials;
use App\Models\BarangayResidents;
use App\Models\BarangayRevenues;

class BarangayCertificatesController extends Controller
{
    public function Certificates(){

        $certificates = BarangayCertificates::latest()->get();
        return view('backend.barangay.barangay_certificates', compact('certificates'));

    } // End method

    public function BarangayCertificate(){

        $barangay_certificate = BarangayCertificates::latest()->get();
        return view('backend.barangay.barangay_certificate', compact('barangay_certificate'));

    } // End method
}
