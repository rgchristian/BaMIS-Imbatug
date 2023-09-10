<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\BarangayClearances;

class BarangayClearancesController extends Controller
{
    public function Clearances(){

        $types = BarangayClearances::latest()->get();
        return view('backend.barangay.barangay_clearances', compact('types'));

    } // End method

    public function BarangayClearance(){

        $types = BarangayClearances::latest()->get();
        return view('backend.barangay.barangay_clearance', compact('types'));

    } // End method
}
