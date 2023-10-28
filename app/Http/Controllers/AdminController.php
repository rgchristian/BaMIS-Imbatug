<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

// Load the models
use App\Models\BarangayOfficials;
use App\Models\BarangayResidents;

//Load the controllers
use App\Http\Controllers\Backend\BarangayResidentsController;
use App\Http\Controllers\Backend\BarangayOfficialsStaffController;

class AdminController extends Controller
{
    public function AdminDashboard() {

        return view('admin.index');

    } // End method

    public function AdminLogout(Request $request) {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');

    } // End method

    public function AdminLogin() {

        return view('admin.admin_login');
        
    } // End method

    public function AdminProfile() {

        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin_profile_view', compact('profileData'));

    } // End method

    // Update admin profile
public function AdminProfileStore(Request $request) {
    $id = Auth::user()->id;
    $data = User::find($id);
    $data->username = $request->username;
    $data->name = $request->name;
    $data->email = $request->email;
    $data->phone = $request->phone;
    $data->address = $request->address;

    if ($request->file('photo')) {
        $file = $request->file('photo');

        // Delete the old profile photo
        @unlink(public_path('upload/admin_images/' . $data->photo));

        $filename = date('YmdHi') . $file->getClientOriginalName();
        $file->move(public_path('upload/admin_images'), $filename);

        // Set the new image filename to the 'photo' attribute
        $data->photo = $filename;
    }

    $data->save();

    $notification = [
        'message' => 'Profile updated successfully',
        'alert-type' => 'success',
    ];

    return redirect()->back()->with($notification);
} // End method

    public function AdminChangePassword(){

        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin_change_password', compact('profileData'));

    } // End method

    public function AdminUpdatePassword(Request $request) {

        // Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed'

        ]);

        // Match the old password
        if(!Hash::check($request->old_password, auth::user()->password)) {

            $notification = array(
                'message' => 'Old password does not match',
                'alert-type' => 'error'
            );
    
            return back()->with($notification);

        } 

        // Update the new password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)

        ]);

        $notification = array(
            'message' => 'Password changed successfully',
            'alert-type' => 'success'
        );

        return back()->with($notification);

    } // End method

    public function About(){

        $about = User::latest()->get();
        return view('backend.barangay.about', compact('about'));

    } // End method

    public function Calendar(){

        return view('backend.barangay.calendar');

    } // End method

    


    

    

}
