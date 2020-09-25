<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purches extends Model
{
    public function supplier(){
        return $this->belongsTo(Suppliers::class,'supplier_id','id');
    }
    public function category(){
        return $this->belongsTo(category::class,'category_id','id');
    }
    public function unit(){
        return $this->belongsTo(Unit::class,'unit_id','id');
    }
    public function product(){
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
