<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\BarangayResidents;
use Illuminate\Support\Facades\Storage;

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

            
            'name' => 'required|unique:barangay_residents|max:200',
            'birthdate' => 'required|date_format:Y-m-d',
            

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

    public function qrCodeExists($number){

        return BarangayResidents::whereQrCode($number)->exists();

    } // End method

}
