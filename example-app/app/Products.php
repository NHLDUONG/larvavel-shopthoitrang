<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = "products";

    public $stimestamps = false;

    public function typeproduct()
    {
        return $this->belongsTo('App\TypeProduct','id_type','id');
        
    }

    public function billdetail()
    {
        return $this->hasMany('App\BillDetail','id_product','id');
        
    }

    public function wishlist(){
        return $this->hasMany(Wishlist::class);
     }
}
