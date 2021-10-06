<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;//phiên bản mới pahir cần use cái này.
use App\Sliders;


class SlideController extends Controller
{
    public function getSlide()
    {
        $slide = Sliders::all();
        return view('admin.slider.list',compact('slide'),[
            'title'=>'Slide'
        ]);
    }

    public function getThem()
    {
        $slide = Sliders::all();
        return view('admin.slider.add',compact('slide'),[
            'title'=>'Slide'
        ]);
    }
    public function postThem(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'link'=>'required',

           ],[
            'name.required'=>'Bạn chưa nhập tên',
            'link.required'=>'Bạn chưa nhập link',
           ]);

        $slide = new Sliders;
        $slide->name = $request->name;
        $slide->link = $request->link;
        if($request->has('link'))
           $slide->link = $request->link;
           
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect('admin/slide/add')->with('loi','Bạn chỉ được thêm file có đuôi jpg, png, jpeg');
   
            }
            $name = $file->getClientOriginalName();
            $image = Str::random(4)."_".$name;// vì mình đang sài php phiên bản mới nên phải sửa lại như vầy mới đúng e nha.
               //str_random(4)."_".$name;// phiên bản php cũ thỳ nó sẽ dùng hàm random như vầy. (vì là phiên bản cũ nên hk cần use cái str ở trên)
            while(file_exists("upload/slide/".$image))
            {
                $image = Str::random(4)."_".$name;
            }
            $file->move("upload/slide",$image);
            //unlink("upload/slide/".$slide->image);
            $slide->image = $image;
        }
        else
        {
            $slide->image = "";
        }
           
           //dd($slide); //này gọi là debug (kiểm tra lỗi bằng cách xuất nó ra xem thử)
        $slide->save();
        return redirect('admin/slide/add')->with('thongbao','Thêm slide thành công');
    }

    public function getEditSlide($id)
    {
        $slide = Sliders::find($id);
        return view('admin.slider.edit',compact('slide'),[
            'title'=>'Slide'
        ]);
    }

    public function postEditSlide(Request $request,$id)
    {
        $this->validate($request,[
            'Ten'=>'required',
            'NoiDung'=>'required',

           ],[
            'Ten.required'=>'Bạn chưa nhập tên',
            'NoiDung.required'=>'Bạn chưa nhập nội dung',
           ]);

        $slide = Sliders::find($id);
        $slide->Ten = $request->Ten;
        $slide->NoiDung = $request->NoiDung;
        if($request->has('link'))
           $slide->link = $request->link;
           
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect('admin/slide/them')->with('loi','Bạn chỉ được thêm file có đuôi jpg, png, jpeg');
   
            }
            $name = $file->getClientOriginalName();
            $image = Str::random(4)."_".$name;// vì mình đang sài php phiên bản mới nên phải sửa lại như vầy mới đúng e nha.
               //str_random(4)."_".$name;// phiên bản php cũ thỳ nó sẽ dùng hàm random như vầy. (vì là phiên bản cũ nên hk cần use cái str ở trên)
            while(file_exists("upload/slide/".$image))
            {
                $image = Str::random(4)."_".$name;
            }
            $file->move("upload/slide",$image);
            unlink("upload/slide/".$slide->image);
            $slide->image = $image;
        }
    
           
           //dd($tintuc); này gọi là debug (kiểm tra lỗi bằng cách xuất nó ra xem thử)
        $slide->save();
        return redirect('admin/slide/sua/'.$id)->with('thongbao','Sửa slide thành công');
    
    }
    public function getXoa($id)
    {
        $slide = Sliders::find($id);
        $slide->delete();

        return redirect('admin/slide/list')->with('thongbao','Xóa thành công');
    }
}
