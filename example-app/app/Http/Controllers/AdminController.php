<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Users;
use App\Sliders;

class AdminController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email:filter',
            'password' => 'required'
        ]);

        if (Auth::attempt([
                'email' => $request->input('email'),
                'password' => $request->input('password')
            ], $request->input('remember'))) {

            return redirect()->route('admin');
        }

        Session::flash('error', 'Email hoặc Password không đúng');
        return redirect()->back();
    }
    function home()
    {
        return view('admin.fonts.home',[
            'title'=>'Đăng Nhập Hệ Thống'
        ]);
    } 

    public function getDanhSach()
    {
        $user = Users::all();
        return view('admin.fonts.users.danhsach',['user'=>$user]);
    }

    public function getlogin()
    {
        return view('admin.fonts.login',[
            'title'=>'Đăng Nhập Hệ Thống'
        ]);
    }

    public function postlogin(Request $request)
    {
        $this->validate($request,[
            'email'=>'required',
            'password'=>'required|min:3|max:32',
           ],[
            'email.required'=>'Bạn chưa nhập email',
            'password.required'=>'Bạn chưa nhập mật khẩu',
            'password.min'=>'Mật khẩu có ít nhất 3 ký tự',
            'password.max'=>'Mật khẩu tối đa 32 ký tự',

            // 'passwordAgain.required'=>'Bạn chưa nhập lại email',
            // 'passwordAgain.same'=>'Mật khẩu nhập lại chưa khớp',

           ]);

        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
        {
            // dd(Auth::user());
            return redirect('admin/home');
        }
        else
        {
            return redirect('admin/login')->with('thongbao','Đăng nhập không thành công');
        }
        
    }
    
}
