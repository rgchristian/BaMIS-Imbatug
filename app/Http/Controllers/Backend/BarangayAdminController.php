<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Load the models
use App\Models\BarangayBlotterRecords;
use App\Models\BarangayResidents;
use App\Models\BarangayAnnouncements;

//Load the controllers
use App\Http\Controllers\Backend\BarangayBlotterRecordsController;
use App\Http\Controllers\Backend\BarangayResidentsController;
use App\Http\Controllers\Backend\BarangayAnnouncementsController;

class BarangayAdminController extends Controller
{
    public function FetchToDashbard() {

        $dashboard_blotter_records = BarangayBlotterRecords::latest()->get();
        $residentsCount = BarangayResidents::count(); // Get the count of residents
        $dashboard_announcements = BarangayAnnouncements::latest()->get();

        return view('admin.index', compact('dashboard_blotter_records', 'residentsCount', 'dashboard_announcements'));
        
    }
}
