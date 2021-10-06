<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeProduct extends Model
{
    protected $table = "typeproduct";

    public $stimestamps = false;

    public function products()
    {
        return $this->hasMany('App\Products','id_type','id');
    }
}
