<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Product;
use App\category;
use App\Unit;
use App\Suppliers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function view(){
        $alldata=Product::all();

        return view('backend.products.products-view',compact('alldata'));
    }
    public function add(){
        $data['suppliers']=Suppliers::all();
        $data['category']=category::all();
        $data['units']=Unit::all();
        return view('backend.products.add-products',$data);
    }

    public function store(Request $request){
        $product=new Product();
        $product->supplier_id = $request->supplier_id;
        $product->category_id = $request->category_id;
        $product->name=$request->name;
        $product->unit_id = $request->unit_id;
        $product->quantity='0';
        $product->created_by=Auth::user()->id;
        $product->save();
        return redirect()->route('products.view')->with('success','Data inserted successfully.');
    }
    public function edit($id){
        $data['suppliers']=Suppliers::all();
        $data['category']=category::all();
        $data['units']=Unit::all();
        $data['editdata']=Product::find($id);
        return view('backend.products.edit-products',$data);
    }
    public function update(Request $request, $id){
        $product=Product::find($id);
        $product->supplier_id = $request->supplier_id;
        $product->category_id = $request->category_id;
        $product->name=$request->name;
        $product->unit_id = $request->unit_id;
        $product->updated_by=Auth::user()->id;
        $product->save();
        return redirect()->route('products.view')->with('success','Data updated successfully.');
    }
    public function delete($id){
        $data=Product::find($id);
        $data->delete();
        return redirect()->route('products.view')->with('success','Data deleted successfully.');
    }
}
