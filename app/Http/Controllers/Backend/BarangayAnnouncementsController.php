<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Models\BarangayAnnouncements;

use App\Models\BarangayAttendanceRecords;
use App\Models\BarangayBlotterRecords;
use App\Models\BarangayCertificates;
use App\Models\BarangayClearances;
use App\Models\BarangayOfficials;
use App\Models\BarangayResidents;
use App\Models\BarangayRevenues;

class BarangayAnnouncementsController extends Controller
{
    public function Announcements(){

        $announcements = BarangayAnnouncements::latest()->get();
        return view('backend.barangay.barangay_announcements', compact('announcements'));

    } // End Method

    public function CreateAnnouncement(){

        return view('backend.barangay.create_announcement');

    } // End Method

    public function StoreAnnouncement(Request $request){

        // Validation
        $request->validate([
            'announcement_name' => ['required', 'max:200', Rule::unique('barangay_announcements')],
            'announcement_photo' => 'image|mimes:jpeg,png,jpg,gif', // Add validation for image type and size
        ]);
    
        $requestData = $request->all();
    
        if ($request->hasFile('announcement_photo')) {
            $file = $request->file('announcement_photo');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension(); // Generate a unique filename
            $file->move(public_path('upload/announcement_images'), $filename);
            $requestData["announcement_photo"] = 'upload/announcement_images/' . $filename;
        }
    
        BarangayAnnouncements::create($requestData);
    
        $notification = array(
            'message' => 'Barangay announcement created successfully.',
            'alert-type' => 'success'
        );
    
        return redirect()->route('barangay.announcements')->with($notification);
    } // End method

}
