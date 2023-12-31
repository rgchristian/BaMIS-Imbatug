<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\BarangayAttendanceRecords;

use App\Models\BarangayAnnouncements;
use App\Models\BarangayBlotterRecords;
use App\Models\BarangayCertificates;
use App\Models\BarangayClearances;
use App\Models\BarangayOfficials;
use App\Models\BarangayResidents;
use App\Models\BarangayRevenues;

class BarangayAttendanceRecordsController extends Controller
{
    public function AttendanceRecords(){

        $attendance_records = BarangayAttendanceRecords::latest()->get();
        return view('backend.barangay.barangay_attendance_records', compact('attendance_records'));

    } // End Method

    public function CreateAttendanceRecord(){

        return view('backend.barangay.create_attendance_record');

    } // End Method

    public function StoreAttendanceRecord(Request $request){

        // Validation
        $request->validate([
            'event_name' => 'required',
            'host_name' => 'required',
            'event_details' => 'required',
            'event_location' => 'required',
            'event_date_time' => 'required',
            'list_attendees' => 'required',
            'attendance_record_date_time_created' => 'required'


        ]);

        BarangayAttendanceRecords::insert([

            'event_name' => $request->event_name,
            'host_name' => $request->host_name,
            'event_details' => $request->event_details,
            'event_location' => $request->event_location,
            'event_date_time' => $request->event_date_time,
            'list_attendees' => $request->list_attendees,
            'attendance_record_date_time_created' => $request->attendance_record_date_time_created
            

        ]);

        $notification = array(
            'message' => 'Barangay attendance record created successfully.',
            'alert-type' => 'success'
        );

        return redirect()->route('barangay.attendance.records')->with($notification);

    } // End Method

    public function EditAttendanceRecord($id){

        $edit_attendance_record = BarangayAttendanceRecords::findOrFail($id);
        return view('backend.barangay.edit_attendance_record', compact('edit_attendance_record'));

    } // End Method

    public function UpdateAttendanceRecord(Request $request){

        $attendance_id = $request->id;

        BarangayAttendanceRecords::findOrFail($attendance_id)->update([

            'event_name' => $request->event_name,
            'host_name' => $request->host_name,
            'event_details' => $request->event_details,
            'event_location' => $request->event_location,
            'event_date_time' => $request->event_date_time,
            'list_attendees' => $request->list_attendees,
            'attendance_record_date_time_created' => $request->attendance_record_date_time_created

        ]);

        $notification = array(
            'message' => 'Barangay attendance record updated successfully.',
            'alert-type' => 'success'
        );

        return redirect()->route('barangay.attendance.records')->with($notification);

    } // End Method

    public function DeleteAttendanceRecord($id){

        BarangayAttendanceRecords::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Barangay attendance record deleted successfully.',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // End Method

    public function ViewAttendanceRecord($id){

        $view_attendance_record = BarangayAttendanceRecords::findOrFail($id);

        return view('backend.barangay.view_attendance_record', compact('view_attendance_record'));

   } // End method


}
