<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\BarangayOfficials;

class BarangayOfficialsStaffController extends Controller
{
    public function Officials(){

        $types = BarangayOfficials::latest()->get();
        return view('backend.barangay.officials_staffs' ,compact('types'));

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

        $types = BarangayOfficials::findOrFail($id);
        return view('backend.barangay.edit_official', compact('types'));

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
