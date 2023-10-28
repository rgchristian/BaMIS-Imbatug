<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Load the models
use App\Models\BarangayOfficials;

//Load the controllers
use App\Http\Controllers\Backend\BarangayOfficialsStaffController;

class BarangayAboutPageController extends Controller
{
    public function FetchToAboutPage() {

        $page_barangay_about = BarangayOfficials::latest()->get();

        return view('frontend.about', compact('page_barangay_about'));
        
    }
}
