<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

// Load the models
use App\Models\BarangayBlotterRecords;
use App\Models\BarangayAttendanceRecords;
use App\Models\BarangayResidents;
use App\Models\BarangayAnnouncements;

//Load the controllers
use App\Http\Controllers\Backend\BarangayBlotterRecordsController;
use App\Http\Controllers\Backend\BarangayAttendanceRecordsController;
use App\Http\Controllers\Backend\BarangayResidentsController;
use App\Http\Controllers\Backend\BarangayAnnouncementsController;



class BarangayAdminController extends Controller
{
    public function FetchToDashbard() {

        $dashboard_blotter_records = BarangayBlotterRecords::latest()->get();
        $attendance_records = BarangayAttendanceRecords::latest()->get();
        $residentsCount = BarangayResidents::count();
        $newResidentsCount = $this->getNewResidentsCount();
        $dashboard_announcements = BarangayAnnouncements::latest()->get();
        $maleResidentsCount = BarangayResidents::where('sex', 'Male')->count();
        $newMaleResidentsCount = $this->getNewMaleResidentsCount();
        $femaleResidentsCount = BarangayResidents::where('sex', 'Female')->count();
        $newFemaleResidentsCount = $this->getNewFemaleResidentsCount();
        $pwdValues = [
            'Deaf', 
            'Intellectual Disability', 
            'Learning Disability', 
            'Mental Disability', 
            'Physical Disability', 
            'Psychosocial Disability', 
            'Speech and Language Impairment', 
            'Visual Disability', 
            'Cancer', 
            'Rare Disease'
        ];
        $pwdResidentsCount = BarangayResidents::whereIn('pwd', $pwdValues)->count();
        $newPwdResidentsCount = $this->getNewPwdResidentsCount($pwdValues);
        $widowResidentsCount = BarangayResidents::whereIn('status', ['Widow/er'])->count();
        $newWidowResidentsCount = $this->getNewWidowResidentsCount();
        $voterResidentsCount = BarangayResidents::where('registered_voter', 'Yes')->count();
        $newVoterResidentsCount = $this->getNewVoterResidentsCount();
        $householdResidentsCount = BarangayResidents::where('household_representative', 'Yes')->count();
        $newHouseholdResidentsCount = $this->getNewHouseholdResidentsCount();
        

        return view('admin.index', compact('dashboard_blotter_records',
                                            'attendance_records',
                                            'residentsCount', 
                                            'newResidentsCount',
                                            'dashboard_announcements', 
                                            'maleResidentsCount',
                                            'newMaleResidentsCount',
                                            'femaleResidentsCount',
                                            'newFemaleResidentsCount',
                                            'pwdValues',
                                            'pwdResidentsCount',
                                            'newPwdResidentsCount',
                                            'widowResidentsCount',
                                            'newWidowResidentsCount',
                                            'voterResidentsCount',
                                            'newVoterResidentsCount',
                                            'householdResidentsCount',
                                            'newHouseholdResidentsCount'
                                            
    ));
        
    } //End method

    private function getNewResidentsCount() {
        
        $lastWeek = now()->subWeek();

        return BarangayResidents::where('created_at', '>=', $lastWeek)->count();

    } //End method

    private function getNewHouseholdResidentsCount() {
        
        $lastWeek = now()->subWeek();
        
        return BarangayResidents::where('household_representative', 'Yes')
            ->where('created_at', '>=', $lastWeek)
            ->count();

    } //End method

    private function getNewMaleResidentsCount() {

        $lastWeek = now()->subWeek();

        return BarangayResidents::where('sex', 'Male')
            ->where('created_at', '>=', $lastWeek)
            ->count();

    } //End method

    private function getNewFemaleResidentsCount() {

        $lastWeek = now()->subWeek();

        return BarangayResidents::where('sex', 'Female')
            ->where('created_at', '>=', $lastWeek)
            ->count();

    } //End method

    private function getNewPwdResidentsCount($pwdValues) {

        $lastWeek = now()->subWeek();

        return BarangayResidents::whereIn('pwd', $pwdValues)
            ->where('created_at', '>=', $lastWeek)
            ->count();

    } //End method

    private function getNewWidowResidentsCount() {

        $lastWeek = now()->subWeek();

        return BarangayResidents::whereIn('status', ['Widow/er'])
            ->where('created_at', '>=', $lastWeek)
            ->count();

    } //End method

    private function getNewVoterResidentsCount() {

        $lastWeek = now()->subWeek();

        return BarangayResidents::where('registered_voter', 'Yes')
            ->where('created_at', '>=', $lastWeek)
            ->count();
            
    } //End method

    public function TotalMale() {

        $maleResidents = BarangayResidents::where('sex', 'Male')->get();

        return view('backend.barangay.total_male_residents', compact('maleResidents'));
    
    } //End method

    public function ViewMaleResident($id){

        $view_male_resident = BarangayResidents::findOrFail($id);

        return view('backend.barangay.view_male_resident', compact('view_male_resident'));

    } // End method

    public function EditMaleResident($id){

        $edit_male_resident = BarangayResidents::findOrFail($id);

        return view('backend.barangay.edit_male_resident', compact('edit_male_resident'));

    } // End method

    public function UpdateMaleResident(Request $request){

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
            'message' => 'Barangay male resident updated successfully.',
            'alert-type' => 'success',
        ];
    
        return redirect()->route('total.male.residents')->with($notification);

    } // End method

    public function DeleteMaleResident($id){
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
            'message' => 'Barangay male resident deleted successfully.',
            'alert-type' => 'success'
        );
    
        return redirect()->back()->with($notification);

    } // End method

    public function TotalFemale() {

        $femaleResidents = BarangayResidents::where('sex', 'Female')->get();

        return view('backend.barangay.total_female_residents', compact('femaleResidents'));
    
    } //End method

    public function ViewFemaleResident($id){

        $view_female_resident = BarangayResidents::findOrFail($id);

        return view('backend.barangay.view_female_resident', compact('view_female_resident'));

    } // End method

    public function EditFemaleResident($id){

        $edit_female_resident = BarangayResidents::findOrFail($id);

        return view('backend.barangay.edit_female_resident', compact('edit_female_resident'));

    } // End method

    public function UpdateFemaleResident(Request $request){

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
            'message' => 'Barangay female resident updated successfully.',
            'alert-type' => 'success',
        ];
    
        return redirect()->route('total.female.residents')->with($notification);

    } // End method

    public function DeleteFemaleResident($id){
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
            'message' => 'Barangay female resident deleted successfully.',
            'alert-type' => 'success'
        );
    
        return redirect()->back()->with($notification);

    } // End method

    public function TotalPWD() {

        $totalpwdValues = [
            'Deaf', 
            'Intellectual Disability', 
            'Learning Disability', 
            'Mental Disability', 
            'Physical Disability', 
            'Psychosocial Disability', 
            'Speech and Language Impairment', 
            'Visual Disability', 
            'Cancer', 
            'Rare Disease'
        ];
        $pwdResidents = BarangayResidents::whereIn('pwd', $totalpwdValues)->get();

        return view('backend.barangay.total_pwd_residents', compact('pwdResidents'));
    
    } //End method

    public function ViewPWDResident($id){

        $view_pwd_resident = BarangayResidents::findOrFail($id);

        return view('backend.barangay.view_pwd_resident', compact('view_pwd_resident'));

    } // End method

    public function EditPWDResident($id){

        $edit_pwd_resident = BarangayResidents::findOrFail($id);

        return view('backend.barangay.edit_pwd_resident', compact('edit_pwd_resident'));

    } // End method

    public function UpdatePWDResident(Request $request){

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
            'message' => 'Barangay person with disability resident updated successfully.',
            'alert-type' => 'success',
        ];
    
        return redirect()->route('total.pwd.residents')->with($notification);

    } // End method

    public function DeletePWDResident($id){
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
            'message' => 'Barangay person with disability resident deleted successfully.',
            'alert-type' => 'success'
        );
    
        return redirect()->back()->with($notification);

    } // End method

    public function TotalSoloParent() {

        $widowResidents = BarangayResidents::whereIn('status', ['Widow/er'])->get();

        return view('backend.barangay.total_solo_parent_residents', compact('widowResidents'));
    
    } //End method

    public function ViewSoloParentResident($id){

        $view_soloparent_resident = BarangayResidents::findOrFail($id);

        return view('backend.barangay.view_soloparent_resident', compact('view_soloparent_resident'));

    } // End method

    public function EditSoloParentResident($id){

        $edit_soloparent_resident = BarangayResidents::findOrFail($id);

        return view('backend.barangay.edit_soloparent_resident', compact('edit_soloparent_resident'));

    } // End method

    public function UpdateSoloParentResident(Request $request){

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
            'message' => 'Barangay solo parent resident updated successfully.',
            'alert-type' => 'success',
        ];
    
        return redirect()->route('total.soloparent.residents')->with($notification);

    } // End method

    public function DeleteSoloParentResident($id){
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
            'message' => 'Barangay solo parent resident deleted successfully.',
            'alert-type' => 'success'
        );
    
        return redirect()->back()->with($notification);

    } // End method

    public function TotalRegisteredVoters() {

        $voterResidents = BarangayResidents::where('registered_voter', 'Yes')->get();

        return view('backend.barangay.total_registered_voters_residents', compact('voterResidents'));
    
    } //End method

    public function ViewRegisteredVoterResident($id){

        $view_registeredvoter_resident = BarangayResidents::findOrFail($id);

        return view('backend.barangay.view_registeredvoter_resident', compact('view_registeredvoter_resident'));

    } // End method

    public function EditRegisteredVoterResident($id){

        $edit_registeredvoter_resident = BarangayResidents::findOrFail($id);

        return view('backend.barangay.edit_registeredvoter_resident', compact('edit_registeredvoter_resident'));

    } // End method

    public function UpdateRegisteredVoterResident(Request $request){

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
            'message' => 'Barangay registered voter resident updated successfully.',
            'alert-type' => 'success',
        ];
    
        return redirect()->route('total.registeredvoters.residents')->with($notification);

    } // End method

    public function DeleteRegisteredVoterResident($id){
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
            'message' => 'Barangay registered voter resident deleted successfully.',
            'alert-type' => 'success'
        );
    
        return redirect()->back()->with($notification);

    } // End method


    public function TotalPurok() {

        return view('backend.barangay.total_purok');
    
    } //End method

    public function PurokOneResidents(){

        $purokOneResidents = BarangayResidents::where('purok', 'Purok 1')->get();

        return view('backend.barangay.purok_one_residents', compact('purokOneResidents'));

    } // End Method

    public function ViewPurokOneResident($id){

        $view_purok_one_resident = BarangayResidents::findOrFail($id);

        return view('backend.barangay.view_purok_one_resident', compact('view_purok_one_resident'));

    } // End method

    public function EditPurokOneResident($id){

        $edit_purok_one_resident = BarangayResidents::findOrFail($id);

        return view('backend.barangay.edit_purok_one_resident', compact('edit_purok_one_resident'));

    } // End method

    public function UpdatePurokOneResident(Request $request){

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
            'message' => 'Barangay purok one resident updated successfully.',
            'alert-type' => 'success',
        ];
    
        return redirect()->route('purok.one.residents')->with($notification);

    } // End method

    public function DeletePurokOneResident($id){
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
            'message' => 'Barangay purok one resident deleted successfully.',
            'alert-type' => 'success'
        );
    
        return redirect()->back()->with($notification);

    } // End method

    public function PurokTwoResidents(){

        $purokTwoResidents = BarangayResidents::where('purok', 'Purok 2')->get();

        return view('backend.barangay.purok_two_residents', compact('purokTwoResidents'));

    } // End Method

    public function ViewPurokTwoResident($id){

        $view_purok_two_resident = BarangayResidents::findOrFail($id);

        return view('backend.barangay.view_purok_two_resident', compact('view_purok_two_resident'));

    } // End method

    public function EditPurokTwoResident($id){

        $edit_purok_two_resident = BarangayResidents::findOrFail($id);
        return view('backend.barangay.edit_purok_two_resident', compact('edit_purok_two_resident'));

    } // End method

    public function UpdatePurokTwoResident(Request $request){

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
            'message' => 'Barangay purok two resident updated successfully.',
            'alert-type' => 'success',
        ];
    
        return redirect()->route('purok.two.residents')->with($notification);

    } // End method

    public function DeletePurokTwoResident($id){
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
            'message' => 'Barangay purok two resident deleted successfully.',
            'alert-type' => 'success'
        );
    
        return redirect()->back()->with($notification);

    } // End method

    public function PurokThreeResidents(){

        $purokThreeResidents = BarangayResidents::where('purok', 'Purok 3')->get();

        return view('backend.barangay.purok_three_residents', compact('purokThreeResidents'));

    } // End Method

    public function ViewPurokThreeResident($id){

        $view_purok_three_resident = BarangayResidents::findOrFail($id);

        return view('backend.barangay.view_purok_three_resident', compact('view_purok_three_resident'));

    } // End method

    public function EditPurokThreeResident($id){

        $edit_purok_three_resident = BarangayResidents::findOrFail($id);
        return view('backend.barangay.edit_purok_three_resident', compact('edit_purok_three_resident'));

    } // End method

    public function UpdatePurokThreeResident(Request $request){

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
            'message' => 'Barangay purok three resident updated successfully.',
            'alert-type' => 'success',
        ];
    
        return redirect()->route('purok.three.residents')->with($notification);

    } // End method

    public function DeletePurokThreeResident($id){
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
            'message' => 'Barangay purok three resident deleted successfully.',
            'alert-type' => 'success'
        );
    
        return redirect()->back()->with($notification);

    } // End method

    public function PurokFourResidents(){

        $purokFourResidents = BarangayResidents::where('purok', 'Purok 4')->get();

        return view('backend.barangay.purok_four_residents', compact('purokFourResidents'));

    } // End Method

    public function ViewPurokFourResident($id){

        $view_purok_four_resident = BarangayResidents::findOrFail($id);

        return view('backend.barangay.view_purok_four_resident', compact('view_purok_four_resident'));

    } // End method

    public function EditPurokFourResident($id){

        $edit_purok_four_resident = BarangayResidents::findOrFail($id);
        return view('backend.barangay.edit_purok_four_resident', compact('edit_purok_four_resident'));

    } // End method

    public function UpdatePurokFourResident(Request $request){

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
            'message' => 'Barangay purok four resident updated successfully.',
            'alert-type' => 'success',
        ];
    
        return redirect()->route('purok.four.residents')->with($notification);

    } // End method

    public function DeletePurokFourResident($id){
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
            'message' => 'Barangay purok four resident deleted successfully.',
            'alert-type' => 'success'
        );
    
        return redirect()->back()->with($notification);

    } // End method

    public function PurokFiveResidents(){

        $purokFiveResidents = BarangayResidents::where('purok', 'Purok 5')->get();

        return view('backend.barangay.purok_five_residents', compact('purokFiveResidents'));

    } // End Method

    public function ViewPurokFiveResident($id){

        $view_purok_five_resident = BarangayResidents::findOrFail($id);

        return view('backend.barangay.view_purok_five_resident', compact('view_purok_five_resident'));

    } // End method

    public function EditPurokFiveResident($id){

        $edit_purok_five_resident = BarangayResidents::findOrFail($id);
        return view('backend.barangay.edit_purok_five_resident', compact('edit_purok_five_resident'));

    } // End method

    public function UpdatePurokFiveResident(Request $request){

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
            'message' => 'Barangay purok five resident updated successfully.',
            'alert-type' => 'success',
        ];
    
        return redirect()->route('purok.five.residents')->with($notification);

    } // End method

    public function DeletePurokFiveResident($id){
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
            'message' => 'Barangay purok five resident deleted successfully.',
            'alert-type' => 'success'
        );
    
        return redirect()->back()->with($notification);
        
    } // End method

    public function PurokSixResidents(){

        $purokSixResidents = BarangayResidents::where('purok', 'Purok 6')->get();

        return view('backend.barangay.purok_six_residents', compact('purokSixResidents'));

    } // End Method

    public function ViewPurokSixResident($id){

        $view_purok_six_resident = BarangayResidents::findOrFail($id);

        return view('backend.barangay.view_purok_six_resident', compact('view_purok_six_resident'));

    } // End method

    public function EditPurokSixResident($id){

        $edit_purok_six_resident = BarangayResidents::findOrFail($id);

        return view('backend.barangay.edit_purok_six_resident', compact('edit_purok_six_resident'));

    } // End method

    public function UpdatePurokSixResident(Request $request){

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
            'message' => 'Barangay purok six resident updated successfully.',
            'alert-type' => 'success',
        ];
    
        return redirect()->route('purok.six.residents')->with($notification);

    } // End method

    public function DeletePurokSixResident($id){
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
            'message' => 'Barangay purok six resident deleted successfully.',
            'alert-type' => 'success'
        );
    
        return redirect()->back()->with($notification);
        
    } // End method

    public function PurokSevenResidents(){

        $purokSevenResidents = BarangayResidents::where('purok', 'Purok 7')->get();

        return view('backend.barangay.purok_seven_residents', compact('purokSevenResidents'));

    } // End Method

    public function ViewPurokSevenResident($id){

        $view_purok_seven_resident = BarangayResidents::findOrFail($id);

        return view('backend.barangay.view_purok_seven_resident', compact('view_purok_seven_resident'));

    } // End method

    public function EditPurokSevenResident($id){

        $edit_purok_seven_resident = BarangayResidents::findOrFail($id);

        return view('backend.barangay.edit_purok_seven_resident', compact('edit_purok_seven_resident'));

    } // End method

    public function UpdatePurokSevenResident(Request $request){

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
            'message' => 'Barangay purok seven resident updated successfully.',
            'alert-type' => 'success',
        ];
    
        return redirect()->route('purok.seven.residents')->with($notification);

    } // End method

    public function DeletePurokSevenResident($id){
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
            'message' => 'Barangay purok seven resident deleted successfully.',
            'alert-type' => 'success'
        );
    
        return redirect()->back()->with($notification);
        
    } // End method

    public function PurokEightResidents(){

        $purokEightResidents = BarangayResidents::where('purok', 'Purok 8')->get();

        return view('backend.barangay.purok_eight_residents', compact('purokEightResidents'));

    } // End Method

    public function ViewPurokEightResident($id){

        $view_purok_eight_resident = BarangayResidents::findOrFail($id);

        return view('backend.barangay.view_purok_eight_resident', compact('view_purok_eight_resident'));

    } // End method

    public function EditPurokEightResident($id){

        $edit_purok_eight_resident = BarangayResidents::findOrFail($id);

        return view('backend.barangay.edit_purok_eight_resident', compact('edit_purok_eight_resident'));

    } // End method

    public function UpdatePurokEightResident(Request $request){

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
            'message' => 'Barangay purok eight resident updated successfully.',
            'alert-type' => 'success',
        ];
    
        return redirect()->route('purok.eight.residents')->with($notification);

    } // End method

    public function DeletePurokEightResident($id){
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
            'message' => 'Barangay purok eight resident deleted successfully.',
            'alert-type' => 'success'
        );
    
        return redirect()->back()->with($notification);
        
    } // End method

    public function PurokNineResidents(){

        $purokNineResidents = BarangayResidents::where('purok', 'Purok 9')->get();

        return view('backend.barangay.purok_nine_residents', compact('purokNineResidents'));

    } // End Method

    public function ViewPurokNineResident($id){

        $view_purok_nine_resident = BarangayResidents::findOrFail($id);

        return view('backend.barangay.view_purok_nine_resident', compact('view_purok_nine_resident'));

    } // End method

    public function EditPurokNineResident($id){

        $edit_purok_nine_resident = BarangayResidents::findOrFail($id);

        return view('backend.barangay.edit_purok_nine_resident', compact('edit_purok_nine_resident'));

    } // End method

    public function UpdatePurokNineResident(Request $request){

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
            'message' => 'Barangay purok nine resident updated successfully.',
            'alert-type' => 'success',
        ];
    
        return redirect()->route('purok.nine.residents')->with($notification);

    } // End method

    public function DeletePurokNineResident($id){
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
            'message' => 'Barangay purok nine resident deleted successfully.',
            'alert-type' => 'success'
        );
    
        return redirect()->back()->with($notification);
        
    } // End method

    public function TotalEthnicity() {

        return view('backend.barangay.total_ethnicity');
    
    } //End method

    public function TalaandigResidents(){

        $talaandigResidents = BarangayResidents::where('tribe', 'Talaandig')->get();

        return view('backend.barangay.talaandig_residents', compact('talaandigResidents'));

    } // End Method

    public function ViewTalaandigResident($id){

        $view_talaandig_resident = BarangayResidents::findOrFail($id);

        return view('backend.barangay.view_talaandig_resident', compact('view_talaandig_resident'));

    } // End method

    public function EditTalaandigResident($id){

        $edit_talaandig_resident = BarangayResidents::findOrFail($id);

        return view('backend.barangay.edit_talaandig_resident', compact('edit_talaandig_resident'));

    } // End method

    public function UpdateTalaandigResident(Request $request){

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
            'message' => 'Barangay talaandig resident updated successfully.',
            'alert-type' => 'success',
        ];
    
        return redirect()->route('talaandig.residents')->with($notification);

    } // End method

    public function DeleteTalaandigResident($id){
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
            'message' => 'Barangay talaandig resident deleted successfully.',
            'alert-type' => 'success'
        );
    
        return redirect()->back()->with($notification);
        
    } // End method

    public function HigaononResidents(){

        $higaononResidents = BarangayResidents::where('tribe', 'Higaonon')->get();

        return view('backend.barangay.higaonon_residents', compact('higaononResidents'));

    } // End Method

    public function ViewHigaononResident($id){

        $view_higaonon_resident = BarangayResidents::findOrFail($id);

        return view('backend.barangay.view_higaonon_resident', compact('view_higaonon_resident'));

    } // End method

    public function EditHigaononResident($id){

        $edit_higaonon_resident = BarangayResidents::findOrFail($id);

        return view('backend.barangay.edit_higaonon_resident', compact('edit_higaonon_resident'));

    } // End method

    public function UpdateHigaononResident(Request $request){

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
            'message' => 'Barangay higaonon resident updated successfully.',
            'alert-type' => 'success',
        ];
    
        return redirect()->route('higaonon.residents')->with($notification);

    } // End method

    public function DeleteHigaononResident($id){
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
            'message' => 'Barangay higaonon resident deleted successfully.',
            'alert-type' => 'success'
        );
    
        return redirect()->back()->with($notification);
        
    } // End method

    public function BukidnonResidents(){

        $bukidnonResidents = BarangayResidents::where('tribe', 'Bukidnon')->get();

        return view('backend.barangay.bukidnon_residents', compact('bukidnonResidents'));

    } // End Method

    public function ViewBukidnonResident($id){

        $view_bukidnon_resident = BarangayResidents::findOrFail($id);

        return view('backend.barangay.view_bukidnon_resident', compact('view_bukidnon_resident'));

    } // End method

    public function EditBukidnonResident($id){

        $edit_bukidnon_resident = BarangayResidents::findOrFail($id);

        return view('backend.barangay.edit_bukidnon_resident', compact('edit_bukidnon_resident'));

    } // End method

    public function UpdateBukidnonResident(Request $request){

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
            'message' => 'Barangay bukidnon resident updated successfully.',
            'alert-type' => 'success',
        ];
    
        return redirect()->route('bukidnon.residents')->with($notification);

    } // End method

    public function DeleteBukidnonResident($id){
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
            'message' => 'Barangay bukidnon resident deleted successfully.',
            'alert-type' => 'success'
        );
    
        return redirect()->back()->with($notification);
        
    } // End method

    public function UmayamnonResidents(){

        $umayamnonResidents = BarangayResidents::where('tribe', 'Umayamnon')->get();

        return view('backend.barangay.umayamnon_residents', compact('umayamnonResidents'));

    } // End Method

    public function ViewUmayamnonResident($id){

        $view_umayamnon_resident = BarangayResidents::findOrFail($id);

        return view('backend.barangay.view_umayamnon_resident', compact('view_umayamnon_resident'));

    } // End method

    public function EditUmayamnonResident($id){

        $edit_umayamnon_resident = BarangayResidents::findOrFail($id);

        return view('backend.barangay.edit_umayamnon_resident', compact('edit_umayamnon_resident'));

    } // End method

    public function UpdateUmayamnonResident(Request $request){

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
            'message' => 'Barangay umayamnon resident updated successfully.',
            'alert-type' => 'success',
        ];
    
        return redirect()->route('umayamnon.residents')->with($notification);

    } // End method

    public function DeleteUmayamnonResident($id){
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
            'message' => 'Barangay umayamnon resident deleted successfully.',
            'alert-type' => 'success'
        );
    
        return redirect()->back()->with($notification);
        
    } // End method

    public function MatigsalugResidents(){

        $matigsalugResidents = BarangayResidents::where('tribe', 'Matigsalug')->get();

        return view('backend.barangay.matigsalug_residents', compact('matigsalugResidents'));

    } // End Method

    public function ViewMatigsalugResident($id){

        $view_matigsalug_resident = BarangayResidents::findOrFail($id);

        return view('backend.barangay.view_matigsalug_resident', compact('view_matigsalug_resident'));

    } // End method

    public function EditMatigsalugResident($id){

        $edit_matigsalug_resident = BarangayResidents::findOrFail($id);

        return view('backend.barangay.edit_matigsalug_resident', compact('edit_matigsalug_resident'));

    } // End method

    public function UpdateMatigsalugResident(Request $request){

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
            'message' => 'Barangay matigsalug resident updated successfully.',
            'alert-type' => 'success',
        ];
    
        return redirect()->route('matigsalug.residents')->with($notification);

    } // End method

    public function DeleteMatigsalugResident($id){
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
            'message' => 'Barangay matigsalug resident deleted successfully.',
            'alert-type' => 'success'
        );
    
        return redirect()->back()->with($notification);
        
    } // End method

    public function ManoboResidents(){

        $manoboResidents = BarangayResidents::where('tribe', 'Manobo')->get();

        return view('backend.barangay.manobo_residents', compact('manoboResidents'));

    } // End Method

    public function ViewManoboResident($id){

        $view_manobo_resident = BarangayResidents::findOrFail($id);

        return view('backend.barangay.view_manobo_resident', compact('view_manobo_resident'));

    } // End method

    public function EditManoboResident($id){

        $edit_manobo_resident = BarangayResidents::findOrFail($id);

        return view('backend.barangay.edit_manobo_resident', compact('edit_manobo_resident'));

    } // End method

    public function UpdateManoboResident(Request $request){

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
            'message' => 'Barangay manobo resident updated successfully.',
            'alert-type' => 'success',
        ];
    
        return redirect()->route('manobo.residents')->with($notification);

    } // End method

    public function DeleteManoboResident($id){
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
            'message' => 'Barangay manobo resident deleted successfully.',
            'alert-type' => 'success'
        );
    
        return redirect()->back()->with($notification);
        
    } // End method

    public function TigwahanonResidents(){

        $tigwahanonResidents = BarangayResidents::where('tribe', 'Tigwahanon')->get();

        return view('backend.barangay.tigwahanon_residents', compact('tigwahanonResidents'));

    } // End Method

    public function ViewTigwahanonResident($id){

        $view_tigwahanon_resident = BarangayResidents::findOrFail($id);

        return view('backend.barangay.view_tigwahanon_resident', compact('view_tigwahanon_resident'));

    } // End method

    public function EditTigwahanonResident($id){

        $edit_tigwahanon_resident = BarangayResidents::findOrFail($id);

        return view('backend.barangay.edit_tigwahanon_resident', compact('edit_tigwahanon_resident'));

    } // End method

    public function UpdateTigwahanonResident(Request $request){

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
            'message' => 'Barangay tigwahanon resident updated successfully.',
            'alert-type' => 'success',
        ];
    
        return redirect()->route('tigwahanon.residents')->with($notification);

    } // End method

    public function DeleteTigwahanonResident($id){
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
            'message' => 'Barangay tigwahanon resident deleted successfully.',
            'alert-type' => 'success'
        );
    
        return redirect()->back()->with($notification);
        
    } // End method


}
