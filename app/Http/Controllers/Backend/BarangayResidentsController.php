<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\BarangayResidents;
use Illuminate\Support\Facades\Storage;

use App\Models\BarangayAnnouncements;
use App\Models\BarangayAttendanceRecords;
use App\Models\BarangayBlotterRecords;
use App\Models\BarangayCertificates;
use App\Models\BarangayClearances;
use App\Models\BarangayOfficials;

class BarangayResidentsController extends Controller
{
    public function Residents() {

        $residents = BarangayResidents::latest()->get();

        return view('backend.barangay.residents', compact('residents'));

    } // End method

    public function AddResident() {

        return view('backend.barangay.add_resident');

    } // End method

    public function StoreResident(Request $request) {

        // Validation
        $request->validate([

            'name' => 'required|unique:barangay_residents|max:200',
            'photo' => 'required',
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'birthdate' => 'required',
            'birthplace' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'blood_type' => 'required',
            'marital_status' => 'required',
            'civil_status' => 'required',
            'h_educ_attainment' => 'required',
            'monthly_income' => 'required',
            'religion' => 'required',
            'nationality' => 'required',
            'philhealth_no' => 'required|unique:barangay_residents|max:200',
            'votersID' => 'required|unique:barangay_residents|max:200',
            'household_no' => 'required',
            'purokID' => 'required',
            'h_ownership_status' => 'required',
            'length_stay' => 'required',
            'r_head_family' => 'required',
            'abled_person' => 'required'
            
        ]);

        $requestData = $request->all();

        if ($request->file('photo')) {
        $file = $request->file('photo');
        $filename = date('YmdHi') . $file->getClientOriginalName();
        
        // Move the uploaded file to the desired folder
        $file->move(public_path('upload/resident_images'), $filename);
        
        // Update the photo field in the $requestData array
        $requestData["photo"] = 'upload/resident_images/' . $filename;

    }
    
        BarangayResidents::create($requestData);
        
        $notification = array(

            'message' => 'Barangay resident added successfully',
            'alert-type' => 'success'
            
        );

        return redirect()->route('barangay.residents')->with($notification);

    } // End method

    public function EditResident($id) {

        $residents = BarangayResidents::findOrFail($id);

        return view('backend.barangay.edit_resident', compact('residents'));

    } // End method

    public function UpdateResident(Request $request) {
        $pid = $request->id;
        $resident = BarangayResidents::findOrFail($pid);
    
        $requestData = $request->except(['_token', '_method', 'id']);
    
        if ($request->hasFile('photo')) {
            // Delete the old photo if it exists
            if ($resident->photo) {
                @unlink(public_path($resident->photo));
            }
    
            // Upload the new photo
            $file = $request->file('photo');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/resident_images'), $filename);
            $requestData["photo"] = 'upload/resident_images/' . $filename;
        } else {
            // If no new photo is uploaded, keep the existing photo in the database
            $requestData["photo"] = $resident->photo;
        }
    
        // Update the resident data
        BarangayResidents::where('id', $pid)->update($requestData);
    
        $notification = array(
            'message' => 'Barangay resident updated successfully',
            'alert-type' => 'success'
        );
    
        return redirect()->route('barangay.residents')->with($notification);

    } // End method

    public function DeleteResident($id) {
        $resident = BarangayResidents::findOrFail($id);
    
        // Delete the associated photo if it exists
        if ($resident->photo) {
            @unlink(public_path($resident->photo));
        }
    
        $resident->delete();
    
        $notification = array(
            'message' => 'Barangay resident removed successfully',
            'alert-type' => 'success'
        );
    
        return redirect()->back()->with($notification);
    }

    public function ViewResident($id) {

        $residents = BarangayResidents::findOrFail($id);

        return view('backend.barangay.view_resident', compact('residents'));

    } // End method

}
