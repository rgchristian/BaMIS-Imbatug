<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Load the models
use App\Models\BarangayOfficials;

//Load the controllers
use App\Http\Controllers\Backend\BarangayOfficialsStaffController;

class BarangayOfficialPageController extends Controller
{
    public function FetchToOfficialPage() {

        $page_barangay_officials = BarangayOfficials::latest()->get();

        return view('frontend.officials', compact('page_barangay_officials'));
        
    }
}
