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
use App\Models\BarangayRevenues;

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
    
        // BarangayResidents::create($requestData);

        BarangayResidents::insert([

            'name' => $request->name,
            'photo' => $requestData["photo"],
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'birthdate' => $request->birthdate,
            'birthplace' => $request->birthplace,
            'age' => $request->age,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'email' => $request->email,
            'blood_type' => $request->blood_type,
            'marital_status' => $request->marital_status,
            'civil_status' => $request->civil_status,
            'h_educ_attainment' => $request->h_educ_attainment,
            'monthly_income' => $request->monthly_income,
            'religion' => $request->religion,
            'nationality' => $request->nationality,
            'philhealth_no' => $request->philhealth_no,
            'votersID' => $request->votersID,
            'household_no' => $request->household_no,
            'purokID' => $request->purokID,
            'h_ownership_status' => $request->h_ownership_status,
            'length_stay' => $request->length_stay,
            'r_head_family' => $request->r_head_family,
            'abled_person' => $request->abled_person

        ]);

        
        $notification = array(

            'message' => 'Barangay resident added successfully',
            'alert-type' => 'success'
            
        );

        return redirect()->route('barangay.residents')->with($notification);

    } // End method

    public function EditResident($id) {

        $edit_resident = BarangayResidents::findOrFail($id);

        return view('backend.barangay.edit_resident', compact('edit_resident'));

    } // End method

    public function UpdateResident(Request $request) {

        $resident_id = $request->id;

        $resident = BarangayResidents::findOrFail($resident_id);
    
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
        BarangayResidents::where('id', $resident_id)->update($requestData);
    
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

        $view_resident = BarangayResidents::findOrFail($id);

        return view('backend.barangay.view_resident', compact('view_resident'));

    } // End method

}
