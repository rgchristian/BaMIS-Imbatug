<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\BarangayOfficials;

use App\Models\BarangayAnnouncements;
use App\Models\BarangayAttendanceRecords;
use App\Models\BarangayBlotterRecords;
use App\Models\BarangayCertificates;
use App\Models\BarangayClearances;
use App\Models\BarangayResidents;
use App\Models\BarangayRevenues;

class BarangayOfficialsStaffController extends Controller
{
    public function Officials(){

        $officials = BarangayOfficials::latest()->get();
        return view('backend.barangay.officials_staffs' ,compact('officials'));

    } // End method

    public function AddOfficial(){

        return view('backend.barangay.add_official');

    } // End method

    public function StoreOfficial(Request $request){

        // Validation
        $request->validate([

            'name' => 'required|unique:barangay_officials|max:200',
            'position' => 'required',
            'status' => 'required',
            'term_start' => 'required',
            'term_end' => 'required'

        ]);

            BarangayOfficials::create([

                'name' => $request->name,
                'position' => $request->position,
                'status' => $request->status,
                'term_start' => $request->term_start,
                'term_end' => $request->term_end

            ]);

            $notification = array(
                'message' => 'Barangay official added successfully',
                'alert-type' => 'success'
            );
    
            return redirect()->route('barangay.officials')->with($notification);

    } // End method

    public function EditOfficial($id){

        $officials = BarangayOfficials::findOrFail($id);
        return view('backend.barangay.edit_official', compact('officials'));

    } // End method

    public function UpdateOfficial(Request $request){

            // Update specific id
            $pid = $request->id;

            BarangayOfficials::findOrFail($pid)->update([

                'name' => $request->name,
                'position' => $request->position,
                'status' => $request->status,
                'term_start' => $request->term_start,
                'term_end' => $request->term_end

            ]);

            $notification = array(
                'message' => 'Barangay official updated successfully',
                'alert-type' => 'success'
            );
    
            return redirect()->route('barangay.officials')->with($notification);

    } // End method

    public function DeleteOfficial($id){

        BarangayOfficials::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Barangay official removed successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // End method


}
