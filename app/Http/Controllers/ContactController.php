<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contacts;

class ContactController extends Controller
{
    function getlienhe()
    {
        return view('page.lienhe',[
            'title'=>'Contact'
        ]);
    }

    function postlienhe()
    {
        // dd(request()->all());   
        $data = request()->validate([
            'email' => 'required|email',
            'msg' => 'required',
            ],[
            'email.required'=>'Bạn chưa nhập email',
            'msg.required'=>'Bạn chưa nhập nội dung',

        ]);
        //khi người dung nhấn nút sumit thy dưới client nó sẽ gửi cái email với ghi chú lên server
        //dd($data); 
        $contact = new Contacts; //khỏi tạo contact model
        $contact->email = $data['email']; //tạo email băng email từ dưới client đưa lên.
        $contact->note = $data['msg']; //tạo ghi chú bằng ghi chú dưới client đưa lên.
        $contact->save(); //lưu vào bảng contact.
        //return redirect('index'); // chuyển vê trang chủ.
        return redirect()->back()->with('thongbao','Đã gửi thành công');
    }
}
