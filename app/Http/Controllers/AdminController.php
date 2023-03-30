<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Models\User;

class AdminController extends Controller
{
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'message' => "User Logout Successfully",
            'alert-type' => 'success'
        );

        return redirect('/login')->with($notification);
    }

    public function profile(){
        $id= Auth::user()->id;
        $adminData = User::find($id);
        return view('admin.admin_profile',compact('adminData'));
    }

    public function editprofile(){
        $id= Auth::user()->id;
        $adminData = User::find($id);
        return view('admin.edit_profile',compact('adminData'));
    }

    public function updateprofile(Request $request){
        // print_r($request);
        $id= Auth::user()->id;
        $adminData = User::find($id);
        $adminData->name = $request->name;  //from the name attritube
        $adminData->email = $request->email;
        if ($request->file('image_profile')){
            $file = $request->file('image_profile');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'),$filename);
            // $adminData['image_profile'] = $filename;
            $adminData->image_profile = $filename;
        }
        $adminData->save();

        $notification = array(
            'message' => "Admin Profile Updated Successfully",
            'alert-type' => 'success'
        );
        return redirect()->route('admin.profile')->with($notification);
    }
}

