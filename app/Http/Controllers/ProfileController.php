<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use App\Models\User;

use function Laravel\Prompts\alert;
use Flasher\Prime\FlasherInterface;

class ProfileController extends Controller
{

    /**
     * Profile
     */

     public function Profile(){
        $id = Auth::user()->id;

        $adminData  = User::find($id);
        return view('backend.admin_profile_view', compact('adminData'));
     }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request, FlasherInterface $flasher)
    {
        date_default_timezone_set('Asia/Dhaka');
        $id = Auth::user()->id;
        $data = User::find($id);
        $data-> name = strtoupper($request->name);
        $data-> username = strtolower($request->username);

        // FOR IMAGE UPDATE
        $customName ="";
        if($request->file('profile_image')){
            $file = $request->file('profile_image');
            $customName =  date('YmdHi').'.'.$file->getClientOriginalExtension();
            @unlink(public_path('upload/profile/'.$data->profile_image));
            $file->move(public_path('upload/profile/'), $customName);
        }else{
            $customName =  $data->profile_image;
        }

        $data-> profile_image = $customName;
        $data-> email = strtolower($request->email);
        $data-> phone = $request->phone;
        $data-> address = $request->address;
        $data->updated_at->now();
        $data->update();

        flash()->flash('success', 'Profile Updated Successfully!');
        return Redirect::route('admin.profile');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    /**
     * Change Password
     */

     public function changePassword(){
        $id = Auth::user()->id;
        $adminData  = User::find($id);
        return view('backend.admin_change_password', compact('adminData'));
     }

     /**
      * Update Password
      */

      public function updatePassword(Request $request){

        $id = Auth::user()->id;
        $user = User::find($id);

        if(Hash::check($request->oldPwd, $user->password)) {
            $validateData = $request->validate([
                'newPwd' => 'required|string|min:8|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/',
                'confirmPwd' => 'required|same:newPwd',
            ]);

            $user->password = Hash::make($request['newPwd']);
            $user->updated_at->now();
            $result =  $user->update();

           if($result){
                flash()->flash('success', 'Password Updated Successfully!');
                return Redirect::route('dashboard');
           }else{
                flash()->flash('warning', 'Password not Updated!');
           }

        } else {
            flash()->flash('error', 'Old Password is mismatch!');
            return Redirect::route('change.password');
        }

      }


}
