<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Models\BarangayOfficials;

class BarangayOfficialsStaffController extends Controller
{
    public function Officials(){

        $officials_staffs = BarangayOfficials::latest()->get();
        return view('backend.barangay.officials_staffs', compact('officials_staffs'));

    } // End method

    public function AddOfficial(){

        return view('backend.barangay.add_official');

    } // End method

    public function StoreOfficial(Request $request){
        // Validation
        $request->validate([
            'name' => ['required', 'max:200', Rule::unique('barangay_officials')],
            'photo' => 'image|mimes:jpeg,png,jpg,gif', // Add validation for image type and size
        ]);
    
        $requestData = $request->all();
    
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension(); // Generate a unique filename
            $file->move(public_path('upload/official_images'), $filename);
            $requestData["photo"] = 'upload/official_images/' . $filename;
        }
    
        BarangayOfficials::create($requestData);
    
        $notification = array(
            'message' => 'Barangay official added successfully.',
            'alert-type' => 'success'
        );
    
        return redirect()->route('barangay.officials')->with($notification);
    } // End method

    public function EditOfficial($id){

        $edit_official = BarangayOfficials::findOrFail($id);
        return view('backend.barangay.edit_official', compact('edit_official'));

    } // End method

    public function UpdateOfficial(Request $request) {
        // Validate the request data
        $request->validate([
            'name' => ['required', 'max:200', Rule::unique('barangay_officials')->ignore($request->id)],
            'photo' => 'image|mimes:jpeg,png,jpg,gif', // Add validation for image type and size
        ]);
    
        // Find the official by ID
        $official = BarangayOfficials::findOrFail($request->id);
    
        // Update the official's data
        $official->name = $request->name;
        $official->position = $request->position;
        $official->status = $request->status;
        $official->term_start = $request->term_start;
        $official->term_end = $request->term_end;
        $official->region = $request->region;
        $official->province = $request->province;
        $official->municipality = $request->municipality;
        $official->barangay = $request->barangay;
        $official->purok = $request->purok;
    
        if ($request->hasFile('photo')) {
            // Handle the photo update
            $file = $request->file('photo');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension(); // Generate a unique filename
    
            // Get the old photo path
            $oldPhotoPath = public_path($official->photo);
    
            // Update the photo field
            $official->photo = 'upload/official_images/' . $filename;
    
            // Move the new photo
            $file->move(public_path('upload/official_images'), $filename);
    
            // Delete the old photo if it exists
            if (file_exists($oldPhotoPath)) {
                unlink($oldPhotoPath); // Delete the old photo file
            }
        }
    
        $official->save();
    
        $notification = [
            'message' => 'Barangay official updated successfully.',
            'alert-type' => 'success',
        ];
    
        return redirect()->route('barangay.officials')->with($notification);
    } // End method

public function DeleteOfficial($id){
    $official = BarangayOfficials::findOrFail($id);

    // Get the photo path before deleting the official
    $photoPath = public_path($official->photo);

    // Delete the official
    $official->delete();

    // Check if the photo file exists and delete it
    if (file_exists($photoPath)) {
        unlink($photoPath); // Delete the photo file
    }

    $notification = array(
        'message' => 'Barangay official deleted successfully.',
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification);
} // End method

    public function ViewOfficial($id){

        $view_official = BarangayOfficials::findOrFail($id);

        return view('backend.barangay.view_official', compact('view_official'));

   } // End method


}
