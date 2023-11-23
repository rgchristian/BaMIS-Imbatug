<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Load the models
use App\Models\BarangayBlotterRecords;
use App\Models\BarangayResidents;
use App\Models\BarangayAnnouncements;

//Load the controllers
use App\Http\Controllers\Backend\BarangayBlotterRecordsController;
use App\Http\Controllers\Backend\BarangayResidentsController;
use App\Http\Controllers\Backend\BarangayAnnouncementsController;

class BarangayAdminController extends Controller
{
    public function FetchToDashbard() {

        $dashboard_blotter_records = BarangayBlotterRecords::latest()->get();
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

    public function TotalFemale() {

        $femaleResidents = BarangayResidents::where('sex', 'Female')->get();

        return view('backend.barangay.total_female_residents', compact('femaleResidents'));
    
    } //End method

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

    public function TotalSoloParent() {

        $widowResidents = BarangayResidents::whereIn('status', ['Widow/er'])->get();

        return view('backend.barangay.total_solo_parent_residents', compact('widowResidents'));
    
    } //End method

    public function TotalRegisteredVoters() {

        $voterResidents = BarangayResidents::where('registered_voter', 'Yes')->get();

        return view('backend.barangay.total_registered_voters_residents', compact('voterResidents'));
    
    } //End method

    public function TotalPurok() {

        return view('backend.barangay.total_purok');
    
    } //End method

    public function PurokOneResidents(){

        $purokOneResidents = BarangayResidents::where('purok', 'Purok 1')->get();

        return view('backend.barangay.purok_one_residents', compact('purokOneResidents'));

    } // End Method

    public function PurokTwoResidents(){

        $purokTwoResidents = BarangayResidents::where('purok', 'Purok 2')->get();

        return view('backend.barangay.purok_two_residents', compact('purokTwoResidents'));

    } // End Method

    public function PurokThreeResidents(){

        $purokThreeResidents = BarangayResidents::where('purok', 'Purok 3')->get();

        return view('backend.barangay.purok_three_residents', compact('purokThreeResidents'));

    } // End Method

    public function PurokFourResidents(){

        $purokFourResidents = BarangayResidents::where('purok', 'Purok 4')->get();

        return view('backend.barangay.purok_four_residents', compact('purokFourResidents'));

    } // End Method

    public function PurokFiveResidents(){

        $purokFiveResidents = BarangayResidents::where('purok', 'Purok 5')->get();

        return view('backend.barangay.purok_five_residents', compact('purokFiveResidents'));

    } // End Method

    public function PurokSixResidents(){

        $purokSixResidents = BarangayResidents::where('purok', 'Purok 6')->get();

        return view('backend.barangay.purok_six_residents', compact('purokSixResidents'));

    } // End Method

    public function PurokSevenResidents(){

        $purokSevenResidents = BarangayResidents::where('purok', 'Purok 7')->get();

        return view('backend.barangay.purok_seven_residents', compact('purokSevenResidents'));

    } // End Method

    public function PurokEightResidents(){

        $purokEightResidents = BarangayResidents::where('purok', 'Purok 8')->get();

        return view('backend.barangay.purok_eight_residents', compact('purokEightResidents'));

    } // End Method

    public function PurokNineResidents(){

        $purokNineResidents = BarangayResidents::where('purok', 'Purok 9')->get();

        return view('backend.barangay.purok_nine_residents', compact('purokNineResidents'));

    } // End Method


}
