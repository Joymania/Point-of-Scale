<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\category;
use App\Purches;
use App\Suppliers;
use App\Unit;
use Illuminate\Support\Facades\Auth;

class PurchesController extends Controller
{
    public function view(){
        $alldata=Purches::orderby('date', 'desc')->orderby('id','desc')->get();

        return view('backend.purches.purches-view',compact('alldata'));
    }
    public function add(){
        $data['suppliers']=Suppliers::all();
        $data['category']=category::all();
        $data['units']=Unit::all();
        return view('backend.purches.add-purches',$data);
    }

    public function store(Request $request){
       
       if($request->category_id==null){
           return redirect()->back()->with('error','Sorry! You donot select any item');
       }
       else
       {
           $count_category=count($request->category_id);
           for($i=0;$i<$count_category;$i++){
               $purches=new Purches();
               $purches->date=date('Y-m-d',strtotime($request->date[$i]));
               $purches->purches_no = $request->purches_no[$i];
               $purches->supplier_id = $request->supplier_id[$i];
               $purches->category_id = $request->category_id[$i];
               $purches->product_id = $request->product_id[$i];
               $purches->buying_qty = $request->buying_qty[$i];
               $purches->unit_price = $request->unit_price[$i];
               $purches->buying_price = $request->buying_price[$i];
               $purches->description = $request->description[$i];
               $purches->created_by = Auth::user()->id;
               $purches->status ='0';
               $purches->save();
           }
       }
       return redirect()->route('purches.view')->with('success','Data saved successfully.');
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
        $data=Purches::find($id);
        $data->delete();
        return redirect()->route('purches.view')->with('success','Data deleted successfully.');
    }

    public function pending(){
        $alldata=Purches::orderby('date', 'desc')->orderby('id','desc')->where('status','0')->get();
        return view('backend.Purches.pending-view',compact('alldata'));
    }
    public function approve($id){
        $purches=Purches::find($id);
        $product=Product::where('id',$purches->product_id)->first();
        $purches_qty=((float)($purches->buying_qty))+((float)($product->quantity));
        $product->quantity=$purches_qty;
        if($product->save()){
            \DB::table('purches')
                ->where('id', $id)
                ->update(['status'=>1]);
        }
        return redirect()->route('pending.view')->with('success','Data Approved successfully.');
    }
}
