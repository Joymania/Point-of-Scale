<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function view(){
        $id=Auth::user()->id;
        $user =User::find($id);
        return view('backend.user.view-profile',compact('user'));
    }
    public function edit(){
        $id=Auth::user()->id;
        $editData=User::find($id);
        return view('backend.user.edit-profile',compact('editData'));
    }
    public function store(Request $request){
        $data=User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->address = $request->address;
        $data->mobile = $request->mobile;
        $data->gender = $request->gender;
        if($request->file('image')){
            $file=$request->file('image');
            @unlink(public_path('upload/user_images/'.$data->image));
            $filename=date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'),$filename);
            $data['image']=$filename;
        }
        $data->save();
        return redirect()->route('profiles.view')->with('success','Profile updated successfully.');
    }
    public function passEdit(){
        return view('backend.user.edit-password');
    }
    public function passStore(Request $request){
        if(Auth::attempt(['id' => Auth::user()->id, 'password' => $request->currentpassword])){
            $data=User::find(Auth::user()->id);
            $data->password=bcrypt($request->newpassword);
            $data->save();
            return redirect()->route('profiles.view');
        }
        else
        {
            return redirect()->back()->with('error','Sorry! Your current password doesnot matched');
        }
    }
}
