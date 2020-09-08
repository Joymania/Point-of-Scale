<?php

namespace App\Http\Controllers\Backend;

use App\category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function view(){
        $alldata=category::all();
        return view('backend.category.category-view',compact('alldata'));
    }
    public function add(){
        return view('backend.category.add-category');
    }

    public function store(Request $request){
        $data=new category();
        $data->name = $request->name;
        $data->created_by=Auth::user()->id;
        $data->save();
        return redirect()->route('category.view')->with('success','Data inserted successfully.');
    }
    public function edit($id){
        $data=category::find($id);
        return view('backend.category.edit-category',compact('data'));
    }
    public function update(Request $request, $id){
        $data=category::find($id);
        $data->name = $request->name;
        $data->updated_by=Auth::user()->id;
        $data->save();
        return redirect()->route('category.view')->with('success','Data updated successfully.');
    }
    public function delete($id){
        $data=category::find($id);
        $data->delete();
        return redirect()->route('category.view')->with('success','Data deleted successfully.');
    }
}
