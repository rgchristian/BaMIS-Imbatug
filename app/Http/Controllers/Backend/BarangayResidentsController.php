<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

use App\Models\BarangayResidents;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ResidentsPhoneExport;
use App\Imports\ResidentsPhoneImport;
use DNS2D;

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
    
        
        $resident->update([
            'region' => $request->region,
            'province' => $request->province,
            'municipality' => $request->municipality,
            'barangay' => $request->barangay,
            'purok' => $request->purok,
            'household_no' => $request->household_no,
            'name' => $request->name,
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'sex' => $request->sex,
            'birthdate' => $request->birthdate,
            'age' => $request->age,
            'status' => $request->status,
            'pwd' => $request->pwd,
            'specified_pwd' => $request->specified_pwd,
            'tribe' => $request->tribe,
            'specified_tribe' => $request->specified_tribe,
            'religion' => $request->religion,
            'specified_religion' => $request->specified_religion,
            'address' => $request->address,
            'citizenship' => $request->citizenship,
            'educational_attainment' => $request->educational_attainment,
            'occupation' => $request->occupation,
            'relation_to_the_hh_head' => $request->relation_to_the_hh_head,
            'family_status' => $request->family_status,
            'specified_family_status' => $request->specified_family_status,
            'moral' => $request->moral,
            'active_participation' => $request->active_participation,
            'registered_voter' => $request->registered_voter,
            'household_representative' => $request->household_representative,
        ]);
    
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
            'message' => 'Barangay resident archived successfully.',
            'alert-type' => 'success'
        );
    
        return redirect()->back()->with($notification);

    } // End method

    public function ViewResident($id){

        $view_resident = BarangayResidents::findOrFail($id);

        return view('backend.barangay.view_resident', compact('view_resident'));

   } // End method

   public function ImportResidentsPhone(Request $request){

        Excel::import(new ResidentsPhoneImport, $request->file('import_residents_phone_numbers'));

        $notification = array(
            'message' => 'Barangay residents phone numbers imported successfully.',
            'alert-type' => 'success'
        );
    
        return redirect()->back()->with($notification);

   } // End method

   public function ExportResidentsPhone(){

        return Excel::download(new ResidentsPhoneExport, 'barangay_imbatug_residents.csv');

   } // End method

   public function DownloadQRCode($id)
    {
        $resident = BarangayResidents::findOrFail($id);

        // Ensure the resident is a household representative and has a QR Code
        if ($resident->household_representative == 'Yes' && $resident->qr_code) {
            // Generate the QR Code SVG markup
            $qrCodeSVG = DNS2D::getBarcodeSVG($resident->qr_code, 'QRCODE', 1.7, 1.7, 'black');

            // Set headers for file download
            $headers = [
                'Content-Type' => 'image/svg+xml',
                'Content-Disposition' => 'attachment; filename="qr_code.svg"',
            ];

            // Return the SVG markup as a downloadable file
            return response($qrCodeSVG, 200, $headers);
        }

        // If QR Code doesn't exist or household_representative is 'No', show an error message
        return redirect()->back()->with(['message' => 'QR Code not found or resident is not a household representative.', 'alert-type' => 'error']);
        
    } // End method

    public function ArchiveResidents(){

        $archive_residents = BarangayResidents::onlyTrashed()->latest()->get();

        return view('backend.barangay.archive_residents', compact('archive_residents'));

    } // End Method

    public function RestoreResident($id){

        $resident = BarangayResidents::withTrashed()->find($id);

        if ($resident) {
            // Restore the soft-deleted (archived) resident
            $resident->restore();

            $notification = [
                'message' => 'Barangay resident restored successfully.',
                'alert-type' => 'success',
            ];

            return redirect()->back()->with($notification);
        }

        abort(404); // Resident not found

    } // End Method

    public function DeletePermanent($id)
    {
        $resident = BarangayResidents::withTrashed()->find($id);

        if ($resident) {
            // Permanently delete the resident
            $resident->forceDelete();

            $notification = [
                'message' => 'Barangay resident deleted successfully.',
                'alert-type' => 'success',
            ];

            return redirect()->back()->with($notification);
        }

        abort(404); // Resident not found

    } // End method


   

   
    


    
   

}


