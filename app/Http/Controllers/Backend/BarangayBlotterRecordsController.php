<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use App\Models\BarangayBlotterRecords;



class BarangayBlotterRecordsController extends Controller
{
    public function BlotterRecords(){

        $blotter_records = BarangayBlotterRecords::latest()->get();
        return view('backend.barangay.barangay_blotter_records', compact('blotter_records'));

    } // End method

    public function CreateBlotterRecord(){

        return view('backend.barangay.create_blotter_record');

    } // End method

    public function StoreBlotterRecord(Request $request){

         // Validation
         $request->validate([
            'incident_type' => 'required',
            'incident_status' => 'required',
            'location' => 'required',
            'remarks' => 'required',
            'incident_date' => 'required',
            'incident_date_recorded' => 'required',
            'settlement_schedule' => 'required',
            'resident_name'	=> 'required|unique:barangay_blotter_records',
            'resident_address' => 'required',
            'resident_phone' => 'required',
            'resident_age' => 'required',
            'complainant_name' => 'required|unique:barangay_blotter_records',
            'complainant_address' => 'required',
            'complainant_phone' => 'required',
            'complainant_age' => 'required',
            'list_mediators' => 'required'
        ]);

        

        BarangayBlotterRecords::insert([

            'incident_type' => $request->incident_type,
            'incident_status' => $request->incident_status,
            'location' => $request->location,
            'remarks' => $request->remarks,
            'incident_date' => $request->incident_date,
            'incident_date_recorded' => $request->incident_date_recorded,
            'settlement_schedule' => $request->settlement_schedule,
            'resident_name' => $request->resident_name,
            'resident_address' => $request->resident_address,
            'resident_phone' => $request->resident_phone,
            'resident_age' => $request->resident_age,
            'complainant_name' => $request->complainant_name,
            'complainant_address' => $request->complainant_address,
            'complainant_phone' => $request->complainant_phone,
            'complainant_age' => $request->complainant_age,
            'list_mediators' => $request->list_mediators
        ]);

        $notification = array(
            'message' => 'Blotter record added successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('barangay.blotter.records')->with($notification);

    } // End method

    public function EditBlotterRecord($id){

        $edit_blotter_record = BarangayBlotterRecords::findOrFail($id);
        return view('backend.barangay.edit_blotter_record', compact('edit_blotter_record'));

    } // End method

    public function UpdateBlotterRecord(Request $request){

       $blotter_id = $request->id;

       

       BarangayBlotterRecords::findOrFail($blotter_id)->update([

           'incident_type' => $request->incident_type,
           'incident_status' => $request->incident_status,
           'location' => $request->location,
           'remarks' => $request->remarks,
           'incident_date' => $request->incident_date,
           'incident_date_recorded' => $request->incident_date_recorded,
           'settlement_schedule' => $request->settlement_schedule,
           'resident_name' => $request->resident_name,
           'resident_address' => $request->resident_address,
           'resident_phone' => $request->resident_phone,
           'resident_age' => $request->resident_age,
           'complainant_name' => $request->complainant_name,
           'complainant_address' => $request->complainant_address,
           'complainant_phone' => $request->complainant_phone,
           'complainant_age' => $request->complainant_age,
           'list_mediators' => $request->list_mediators

       ]);

       $notification = array(
           'message' => 'Blotter record updated successfully',
           'alert-type' => 'success'
       );

       return redirect()->route('barangay.blotter.records')->with($notification);

   } // End method

   public function DeleteBlotterRecord($id){

        BarangayBlotterRecords::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Blotter record deleted successfully',
            'alert-type' => 'success'
        );
 
        return redirect()->back()->with($notification);

   } // End method

   public function ViewBlotterRecord($id){

        $view_blotter_record = BarangayBlotterRecords::findOrFail($id);

        return view('backend.barangay.view_blotter_record', compact('view_blotter_record'));

   } // End method

   //Fetch data blotter records to admin dashboard
   public function DashBlotterRecords(){

    $dash_blotter_records = BarangayBlotterRecords::latest()->get();

    return view('admin.index', compact('dash_blotter_records'));

   } // End method

   public function markBlotterRecordAsDone($id)
{
    // Find the blotter record by its ID
    $blotterRecord = BarangayBlotterRecords::find($id);

    if (!$blotterRecord) {
        // Handle the case where the record is not found
        return redirect()->route('barangay.blotter.records')->with('error', 'Blotter record not found');
    }

    // Update the status to "Finished"
    $blotterRecord->incident_status = 'Finished';
    $blotterRecord->save();

    $notification = array(
        'message' => 'Blotter record settled successfully',
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification);

    
} // End method



}
