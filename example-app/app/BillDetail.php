<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    protected $table = "billdetail";

    public function bills()
    {
        return $this->belongsTo('App\Bills','id_bill','id');
        
    }
}
