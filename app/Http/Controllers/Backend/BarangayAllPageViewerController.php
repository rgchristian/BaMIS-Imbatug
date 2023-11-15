<?php

// feeling nako wala naniy pulos ywwwwwwwwwwwwwwwwwwwwwww

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BarangayAllPageViewerController extends Controller
{
    public function BarangayHome(){

        return view('frontend.master');

    } // End method

    public function BarangayAbout(){

        return view('frontend.about');

    } // End method

    public function BarangayService(){

        return view('frontend.service');

    } // End method

    public function BarangayContact(){

        return view('frontend.contact');

    } // End method

    public function BarangayOfficials(){

        return view('frontend.officials');

    } // End method
}
