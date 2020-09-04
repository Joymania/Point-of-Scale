<?php

namespace App\Http\Controllers\Backend;

use App\Customers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function view(){
        $alldata=Customers::all();
        return view('backend.customer.customers-view',compact('alldata'));
    }
    public function add(){
        return view('backend.customer.add-customers');
    }

    public function store(Request $request){
        $data=new Customers();
        $data->name = $request->name;
        $data->mobile_no=$request->mobile;
        $data->email = $request->email;
        $data->address =$request->address;
        $data->created_by=Auth::user()->id;
        $data->save();
        return redirect()->route('customers.view')->with('success','Data inserted successfully.');
    }
    public function edit($id){
        $data=Customers::find($id);
        return view('backend.customer.edit-customers',compact('data'));
    }
    public function update(Request $request, $id){
        $data=Customers::find($id);
        $data->name = $request->name;
        $data->mobile_no = $request->mobile;
        $data->email = $request->email;
        $data->address = $request->address;
        $data->updated_by=Auth::user()->id;
        $data->save();
        return redirect()->route('customers.view')->with('success','Data updated successfully.');
    }
    public function delete($id){
        $data=Customers::find($id);
        $data->delete();
        return redirect()->route('customers.view')->with('success','Data deleted successfully.');
    }
}
