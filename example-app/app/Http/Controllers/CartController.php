<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function getdanhsach(){
        return view('admin.carts.danhsach',[
            'title'=>'Danh Sách Đơn Hàng'
        ]);
    }
}
