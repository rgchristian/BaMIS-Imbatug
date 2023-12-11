<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Models\BarangayResidents;
use Illuminate\Support\Facades\DB;

class BarangayResidentsController extends Controller
{
    public function Residents(){

        $residents = BarangayResidents::latest()->get();
        return view('backend.barangay.residents', compact('residents'));

    } // End Method

    public function AddResident(){

        return view('backend.barangay.add_resident');

    } // End Method

    public function StoreResident(Request $request) {

        $number = mt_rand(1000000000, 9999999999);

        if ($this->qrCodeExists($number)) {
            $number = mt_rand(1000000000, 9999999999);
        }

        $request['qr_code'] = $number;

         // Validation
         $request->validate([

            
            'name' => ['required', 'max:200', Rule::unique('barangay_residents')],
            'birthdate' => 'required|date_format:Y-m-d',
            'photo' => 'image|mimes:jpeg,png,jpg,gif',
            

         ]);

         $requestData = $request->all();

         // Check if the resident is a household representative
    if ($request->input('household_representative') == 'Yes') {
        $number = mt_rand(1000000000, 9999999999);

        if ($this->qrCodeExists($number)) {
            $number = mt_rand(1000000000, 9999999999);
        }

        $requestData['qr_code'] = $number;
    }
    
         if ($request->hasFile('photo')) {
             $file = $request->file('photo');
             $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension(); // Generate a unique filename
             $file->move(public_path('upload/resident_images'), $filename);
             $requestData["photo"] = 'upload/resident_images/' . $filename;
         }
    
        BarangayResidents::create($requestData);

        
        $notification = array(

            'message' => 'Barangay resident added successfully.',
            'alert-type' => 'success'
            
        );

        return redirect()->route('barangay.residents')->with($notification);

    } // End method

    public function qrCodeExists($number){

        return BarangayResidents::whereQrCode($number)->exists();

    } // End method

    public function EditResident($id){

        $edit_resident = BarangayResidents::findOrFail($id);
        return view('backend.barangay.edit_resident', compact('edit_resident'));

    } // End method

    public function UpdateResident(Request $request){

        $request->validate([
            'name' => ['required', 'max:200', Rule::unique('barangay_residents')->ignore($request->id)],
            'photo' => 'image|mimes:jpeg,png,jpg,gif', // Add validation for image type and size
        ]);
    
        $resident = BarangayResidents::findOrFail($request->id);
    
        
        // $resident->qr_code = $request->qr_code;
        $resident->photoStore = $request->photoStore;
	    $resident->region = $request->region;
        $resident->province = $request->province;
        $resident->municipality = $request->municipality;
        $resident->barangay = $request->barangay;
        $resident->purok = $request->purok;
        $resident->household_no = $request->household_no;
        $resident->date_filed_resident_profile = $request->date_filed_resident_profile;
        $resident->signature = $request->signature;
        $resident->name = $request->name;
        // $resident->photo = $request->photo;
        $resident->first_name = $request->first_name;
        $resident->middle_name = $request->middle_name;
        $resident->last_name = $request->last_name;
        $resident->phone = $request->phone;
        $resident->sex = $request->sex;
        $resident->birthdate = $request->birthdate;
        $resident->age = $request->age;
        $resident->status = $request->status;
        $resident->pwd = $request->pwd;
        $resident->tribe = $request->tribe;
        $resident->religion = $request->religion;
        $resident->address = $request->address;
        $resident->citizenship = $request->citizenship;
        $resident->educational_attainment = $request->educational_attainment;
        $resident->occupation = $request->occupation;
        $resident->relation_to_the_hh_head = $request->relation_to_the_hh_head;
        $resident->moral = $request->moral;
        $resident->active_participation = $request->active_participation;
        $resident->registered_voter = $request->registered_voter;
        $resident->household_representative = $request->household_representative;
    
        if ($request->hasFile('photo')) {
            // Handle the photo update
            $file = $request->file('photo');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
    
            // Get the old photo path
            $oldPhotoPath = public_path($resident->photo);
    
            // Update the 'photo' field in the resident model
            $resident->photo = 'upload/resident_images/' . $filename;
    
            // Move the new photo
            $file->move(public_path('upload/resident_images'), $filename);
    
            // Delete the old photo if it exists
            if (file_exists($oldPhotoPath)) {
                unlink($oldPhotoPath); // Delete the old photo file
            }
        }
    
        // Save the updated resident record
        $resident->save();
    
        $notification = [
            'message' => 'Barangay resident updated successfully.',
            'alert-type' => 'success',
        ];
    
        return redirect()->route('barangay.residents')->with($notification);
    } // End method

    public function DeleteResident($id){
        $resident = BarangayResidents::findOrFail($id);
    
        // Get the photo path before deleting the official
        $photoPath = public_path($resident->photo);
    
        // Delete the official
        $resident->delete();
    
        // Check if the photo file exists and delete it
        if (file_exists($photoPath)) {
            unlink($photoPath); // Delete the photo file
        }
    
        $notification = array(
            'message' => 'Barangay resident deleted successfully.',
            'alert-type' => 'success'
        );
    
        return redirect()->back()->with($notification);
    } // End method

    public function ViewResident($id){

        $view_resident = BarangayResidents::findOrFail($id);

        return view('backend.barangay.view_resident', compact('view_resident'));

   } // End method

   
    


    
   

}


