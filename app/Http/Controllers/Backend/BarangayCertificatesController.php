<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\BarangayCertificates;


class BarangayCertificatesController extends Controller
{
    public function Certificates(){

        $types = BarangayCertificates::latest()->get();
        return view('backend.barangay.barangay_certificates', compact('types'));

    } // End method

    public function BarangayCertificate(){

        $types = BarangayCertificates::latest()->get();
        return view('backend.barangay.barangay_certificate', compact('types'));

    } // End Method
}
