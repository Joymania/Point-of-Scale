<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Suppliers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuppliersController extends Controller
{
    public function view(){
        $alldata=Suppliers::all();
        return view('backend.Suppliers.suppliers-view',compact('alldata'));
    }
    public function add(){
        return view('backend.Suppliers.add-suppliers');
    }

    public function store(Request $request){
        $data=new Suppliers();
        $data->name = $request->name;
        $data->mobile_no=$request->mobile;
        $data->email = $request->email;
        $data->address =$request->address;
        $data->created_by=Auth::user()->id;
        $data->save();
        return redirect()->route('suppliers.view')->with('success','Data inserted successfully.');
    }
    public function edit($id){
        $data=Suppliers::find($id);
        return view('backend.Suppliers.edit-suppliers',compact('data'));
    }
    public function update(Request $request, $id){
        $data=Suppliers::find($id);
        $data->name = $request->name;
        $data->mobile_no = $request->mobile;
        $data->email = $request->email;
        $data->address = $request->address;
        $data->updated_by=Auth::user()->id;
        $data->save();
        return redirect()->route('suppliers.view')->with('success','Data updated successfully.');
    }
    public function delete($id){
        $data=Suppliers::find($id);
        $data->delete();
        return redirect()->route('suppliers.view')->with('success','Data deleted successfully.');
    }
}
