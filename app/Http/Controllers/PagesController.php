<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Users;
use Hash;
use Auth;
use App\Sliders;
use App\Products;
use App\Cart;
use App\Menus;
use App\Abouts;
use App\Color;
use App\Parameter;
use Session;



class PagesController extends Controller
{
    public function index()
    {
        //Session::forget('cart');
        //die();
        // $slider = sliders::all();
        $new_product = Products::all();
        $menu = Menus::all();
        $color = Color::all();
        $param = Parameter::all();

        if(Session('cart')){
            $oldCart = Session::get('cart');
            $cart = new Cart($oldCart);
            //dd($cart);
        //    $view->with(['cart'=>Session::get('cart'),'product_cart'=>$cart->items,'totalPrice'=>$cart->totalPrice,'totalQty'=>$cart->totalQty]);
        
        }
        return view('page.index',compact('new_product','menu','color','param'),[
            'title'=>'Home'
        ]);
        // view()->share('slider,$slider');
    }

    public function productwomen()
    {
        
        $women_product = Products::where('id_type',1)->get();
        $menu = Menus::all();
        
        
        return view('page.product_women',compact('women_product','menu'),[
            'title'=>'Home'
        ]);
        
    }

    public function productmen()
    {
        
        $men_product = Products::where('id_type',2)->get();
        $menu = Menus::all();
        
        
        return view('page.product_men',compact('men_product','menu'),[
            'title'=>'Home'
        ]);
        
    }


    function about()
    {
        $about = Abouts::all();
        return view('page.about',compact('about'),[
            'title'=>'About'
        ]);
    }

    function blog()
    {
        return view('page.blog',[
            'title'=>'Blog'
        ]);
    }

    function product()
    {
        $slider = sliders::all();
        $new_product = Products::all();
        $title = "Product";
        return view('page.product',compact('slider','new_product', "title"));
    }

    function getChitiet(Request $req,$id)
    {
        $sanpham = Products::find($id);
        // $sp_tuongtu = Product::where ('id_type',$sanpham->id_type)->paginate(6);
        // $sanpham_khuyenmai = Product::where('promotion_price','<>',0)->paginate(4);
        // $new_product = Product::where('new',1)->paginate(4);
        $title = "Product detail";
        return view('page.product_detail',compact('sanpham',"title"));
    }

    function shopingcart()
    {
        $cart = Cart::all();
        return view('page.shoping_cart',compact('cart'),[
            'title'=>'Cart']);
    }

    function blogdetail()
    {
        return view('page.blogdetail',[
            'title'=>'Blog Detail'
        ]);
    }

    public function getAddtoCart(Request $req,$id){
        
        //dd($req);
        $product = Products::find($id);// tìm kiếm sản phẩm theo id truyền vào.
        if($req->input('size')){ //kiem tra xxem la co chọn size khi mua hàng không
            $product->size = $req->input('size');//nếu có chọn size thỳ gán size đó vào sản phẩm đang mua
        }
        if($req->input('color')){ //kiểm tra xem là có chọn màu khi mua hàng không
            $product->color =  $req->input('color'); //nếu có chọn màu thỳ gán màu cho sản phẩm đang mua
        }
        
        $oldCart = Session('cart')?Session::get('cart'):null; // chỗ này là biểu thức luận lí , nếu như có cái Session('cart') thỳ gán oldCart =  Session::get('cart') ngược lại gán oldCart = null . này viết theo biểu thức luận lí cho nó ngắn gọn chuk viết dài dòng thỳ như vần nek e.

        // $oldCart = "";  
        // if(Session('cart')){
        //     $oldCart = Session::get('cart');
        // }else{
        //     $oldCart = null;
        // }

        $cart = new Cart($oldCart);// tạo giỏ hàng mới (new Cart tức là nó gọi cái file Cart.php nó chạy vào cái hàm __contruct để khởi tạo giỏ hàng)
        //$cart->items[$id]["qty"] = $req->input('num-product2')
        $num_product = $req->input('num-product');
        if($req->input('num-product2')){
            $cart->update($product, $id, $req->input('num-product2'));
        }
        if($num_product){ //kiếm tra xem là có chọn số lượng mua hàng hay không
            for($i=0; $i < $num_product; $i++){ //nếu có thỳ mình duyệt qua số lượng và add nó vào giỏ hàng. (ví dụ chọn số lượng là 3 thỳ mình dùng vòng lặp for duyệt qa từ 0,1,2 để thêm sản phẩm vào.)
                $cart->add($product,$id); // thêm sản phẩm vào giỏ hàng vừa khởi tạo.
            }
        }
        $req->session()->put('cart',$cart); //thêm giỏ hàng vừa tạo vào session để lưu tạm.
        if($req->input('num-product')){
            return redirect()->back(); //quay về trang hiện tại.
        }else if($req->input('num-product2')){
            return (json_encode($cart));
        }
        
        
        

    }
    public function getProduct($id){ 
        $product = Products::find($id);// tìm kiếm sản phẩm theo id truyền vào.
        return $product; //trả sản phẩm tìm dc xún view 
    }

    public function getAddtoLike(Request $req,$id){
        
        //dd($req);
        $product = Products::find($id);// tìm kiếm sản phẩm theo id truyền vào.
        // if($req->input('size')){ //kiem tra xxem la co chọn size khi mua hàng không
        //     $product->size = $req->input('size');//nếu có chọn size thỳ gán size đó vào sản phẩm đang mua
        // }
        // if($req->input('color')){ //kiểm tra xem là có chọn màu khi mua hàng không
        //     $product->color =  $req->input('color'); //nếu có chọn màu thỳ gán màu cho sản phẩm đang mua
        // }
        
        $oldLike = Session('like')?Session::get('like'):null; // chỗ này là biểu thức luận lí , nếu như có cái Session('cart') thỳ gán oldCart =  Session::get('cart') ngược lại gán oldCart = null . này viết theo biểu thức luận lí cho nó ngắn gọn chuk viết dài dòng thỳ như vần nek e.

        // $oldCart = "";  
        // if(Session('cart')){
        //     $oldCart = Session::get('cart');
        // }else{
        //     $oldCart = null;
        // }

        $like = new Like($oldLike);// tạo giỏ hàng mới (new Cart tức là nó gọi cái file Cart.php nó chạy vào cái hàm __contruct để khởi tạo giỏ hàng)
        if($req->input('num-product')){ //kiếm tra xem là có chọn số lượng mua hàng hay không
            for($i=0; $i < $req->input('num-product'); $i++){ //nếu có thỳ mình duyệt qua số lượng và add nó vào giỏ hàng. (ví dụ chọn số lượng là 3 thỳ mình dùng vòng lặp for duyệt qa từ 0,1,2 để thêm sản phẩm vào.)
                $like->add($product,$id); // thêm sản phẩm vào giỏ hàng vừa khởi tạo.
            }
        }
        $req->session()->put('like',$like); //thêm giỏ hàng vừa tạo vào session để lưu tạm.
        return redirect()->back(); //quay về trang hiện tại.

    }

    public function getCheckout(){
        $oldCart = Session('cart')?Session::get('cart'):null;

        $Cart = new Cart($oldCart);

        //dd($Cart->items);
        return view('page.shoping_cart',[
            'title'=>'Cart',
            'cart' => $Cart
        ]);
    }

    public function postCheckout(Request $req){
        $cart = Session::get('cart');
        
        $customer = new Customer;
        $customer->name = $req->name;
        $customer->gender = $req->gender;
        $customer->email = $req->email;
        $customer->address = $req->address;
        $customer->phone_number = $req->phone;
        $customer->note = $req->notes;
        $customer->save();

        $bill = new Bill;
        $bill->id_customer = $customer->id;
        $bill->date_order = date('Y-m-d');
        $bill->total = $cart->totalPrice;
        $bill->payment = $req->payment_method;
        $bill->note = $req->notes;
        $bill->save();

        foreach ($cart->items as $key => $value) {
            $bill_detail = new BillDetail;
            $bill_detail->id_bill = $bill->id;
            $bill_detail->id_product = $key;
            $bill_detail->quantily = $value['qty'];
            $bill_detail->unit_price = ($value['price']/$value['qty']);
            $bill_detail->save();
    
        }
        Session::forget('cart');
        return redirect()->back()->with('thongbao','Đặt hàng thành công');
       
    } 

    public function getDelItemCart($id) { // hàm xóa sản phẩm trong giỏ hàng
        $oldCart = Session::has('cart')?Session::get('cart'):null; // chỗ này là biểu thức luận lí , nếu như có cái Session('cart') thỳ gán oldCart =  Session::get('cart') ngược lại gán oldCart = null . này viết theo biểu thức luận lí cho nó ngắn gọn chuk viết dài dòng thỳ như vần nek e.
        
       // $oldCart = "";  
       // if(Session('cart')){
       //     $oldCart = Session::get('cart');
       // }else{
       //     $oldCart = null;
       // }
        $cart = new Cart($oldCart); //  
        $cart->removeItem($id); //xóa sản phẩm có id ra khỏi giỏ hàng
        if(count($cart->items)>0){ // nếu như sau khi xóa xong mak giỏ hàng còn sản phẩm trong đó thỳ mình gán lại session giỏ hàng.
            Session::put('cart',$cart); //gán lại giỏ hàng
        }
        else{ 
            Session::forget('cart'); // nếu xóa sạch giỏ hàng hk còn sản phẩm nào thỳ xóa lun cái session.
        }
        return redirect()->back(); // quay về trang hiện tại.
    }

    public function getSearch(Request $req){
        $product = Products::where('name','like','%'.$req->key.'%')
                            ->orWhere('price',$req->key)
                            ->get();
        $title = "Product";
        return view('page.search',compact('product','title'));
    }

}
