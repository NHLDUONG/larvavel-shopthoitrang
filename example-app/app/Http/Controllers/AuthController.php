<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Auth;
use App\Users;

class AuthController extends Controller
{
    public function getSignin(){
        return view('page.signin',['title'=>'Đăng Kí']);
    }
 
    public function postSignin(Request $req){ //đây là pót đăng kí.
        $this->validate($req,
        [
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:6|max:20',
            'name'=>'required',
            're_password'=>'required|same:password'
        ],
        [
            'email.required'=>'Vui lòng nhập email',
            'email.email'=>'Không đúng định dạng email',
            'email.unique'=>'Email đã có người sử dụng',
            'password.required'=>'Vui lòng nhập mật khẩu',
            're_password.same'=>'Mật khẩu không giống nhau',
            'password.min'=>'Mật khẩu ít nhất 6 kí tự',
        ]);
        $user = new Users();
        $user->name =$req->name;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->phone = $req->phone;
        $user->address = $req->address;
        $user->save();
        return redirect()->back()->with('thanhcong','Tạo tài khoản thành công');
 
    }

    public function getLogin(){
        return view('page.login',['title'=>'Đăng Nhập']);
    }
 
    
 
    public function postLogin(Request $req){
        $this->validate($req,
        [
            'email'=>'required|email|',
            'password'=>'required|min:6|max:20'
        ],
        [
            'email.required'=>'Vui lòng nhập email',
            'email.email'=>'Email không đúng định dạng',
            'password.required'=>'Vui lòng nhập mật khẩu',
            'password.min'=>'Mật khẩu ít nhất 6 kí tự',
            'password.max'=>'Mật khẩu không quá 20 kí tự'
        ]
        );
       
        $credentials = array('email'=>$req->email,'password'=>$req->password);
        //dd($credentials);
        if(Auth::attempt($credentials)){
            return redirect()->back()->with(['flag'=>'success','message'=>'Đăng nhập thành công']);
        }
        else{
            return redirect()->back()->with(['flag'=>'danger','message'=>'Đăng nhập không thành công']);
        }
 
    }
    public function getLogout(){
        Auth::logout();
        return redirect()->back()->with('thanhcong','Đăng xuất thành công');
    }



}
