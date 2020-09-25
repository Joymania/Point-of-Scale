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
class DefaultController extends Controller
{
    public function getCategory(Request $request){
        $supplier_id = $request->supplier_id;
        $allCategory = Product::with(['category'])->select('category_id')->where('supplier_id',$supplier_id)-> groupBy('category_id')->get();
        return response()->json($allCategory);
    }

    public function getProduct(Request $request){
        $category_id = $request->category_id;
        $allproduct = Product::where('category_id',$category_id)->get();
        return response()->json($allproduct);

    }
}
