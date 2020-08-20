<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function view(){
        $data['alldata'] =User::all();
        return view('backend.user.view-user',$data);
    }
    public function add(){
        return view('backend.user.add-user');
    }
    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|unique:users,email',
            'password'=>'required'
        ]);
        $data=new User();
        $data->usertype = $request->usertype;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->save();
        return redirect()->route('users.view')->with('success','Data inserted successfully.');
    }
    public function edit($id){
        $data=User::find($id);
        return view('backend.user.edit-user',compact('data'));
    }
    public function update(Request $request, $id){
        $data=User::find($id);
        $data->usertype = $request->usertype;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->save();
        return redirect()->route('users.view')->with('success','Data updated successfully.');
    }
    public function delete($id){
        $data=User::find($id);
        if(file_exists('upload/user_images' . $data->image)AND !empty($data->image)){
            unlink('upload/user_images' . $data->image);
        }
        $data->delete();
        return redirect()->route('users.view')->with('success','Data deleted successfully.');
    }
}
