<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UnitController extends Controller
{
    public function view(){
        $alldata=Unit::all();
        return view('backend.unit.unit-view',compact('alldata'));
    }
    public function add(){
        return view('backend.unit.add-unit');
    }

    public function store(Request $request){
        $data=new Unit();
        $data->name = $request->name;
        $data->created_by=Auth::user()->id;
        $data->save();
        return redirect()->route('unit.view')->with('success','Data inserted successfully.');
    }
    public function edit($id){
        $data=Unit::find($id);
        return view('backend.unit.edit-unit',compact('data'));
    }
    public function update(Request $request, $id){
        $data=Unit::find($id);
        $data->name = $request->name;
        $data->updated_by=Auth::user()->id;
        $data->save();
        return redirect()->route('unit.view')->with('success','Data updated successfully.');
    }
    public function delete($id){
        $data=Unit::find($id);
        $data->delete();
        return redirect()->route('unit.view')->with('success','Data deleted successfully.');
    }
}
