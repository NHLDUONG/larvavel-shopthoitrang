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
        $product = Products::find($id);// t??m ki???m s???n ph???m theo id truy???n v??o.
        if($req->input('size')){ //kiem tra xxem la co cho??n size khi mua ha??ng kh??ng
            $product->size = $req->input('size');//n????u co?? cho??n size thy?? ga??n size ??o?? va??o sa??n ph????m ??ang mua
        }
        if($req->input('color')){ //ki????m tra xem la?? co?? cho??n ma??u khi mua ha??ng kh??ng
            $product->color =  $req->input('color'); //n????u co?? cho??n ma??u thy?? ga??n ma??u cho sa??n ph????m ??ang mua
        }
        
        $oldCart = Session('cart')?Session::get('cart'):null; // ch??? n??y l?? bi???u th???c lu???n l?? , n???u nh?? c?? c??i Session('cart') th??? g??n oldCart =  Session::get('cart') ng?????c l???i g??n oldCart = null . n??y vi???t theo bi???u th???c lu???n l?? cho n?? ng???n g???n chuk vi???t d??i d??ng th??? nh?? v???n nek e.

        // $oldCart = "";  
        // if(Session('cart')){
        //     $oldCart = Session::get('cart');
        // }else{
        //     $oldCart = null;
        // }

        $cart = new Cart($oldCart);// ta??o gio?? ha??ng m????i (new Cart t????c la?? no?? go??i ca??i file Cart.php no?? cha??y va??o ca??i ha??m __contruct ?????? kh????i ta??o gio?? ha??ng)
        //$cart->items[$id]["qty"] = $req->input('num-product2')
        $num_product = $req->input('num-product');
        if($req->input('num-product2')){
            $cart->update($product, $id, $req->input('num-product2'));
        }
        if($num_product){ //ki????m tra xem la?? co?? cho??n s???? l??????ng mua ha??ng hay kh??ng
            for($i=0; $i < $num_product; $i++){ //n????u co?? thy?? mi??nh duy????t qua s???? l??????ng va?? add no?? va??o gio?? ha??ng. (vi?? du?? cho??n s???? l??????ng la?? 3 thy?? mi??nh du??ng vo??ng l????p for duy????t qa t???? 0,1,2 ?????? th??m sa??n ph????m va??o.)
                $cart->add($product,$id); // th??m sa??n ph????m va??o gio?? ha??ng v????a kh????i ta??o.
            }
        }
        $req->session()->put('cart',$cart); //th??m gio?? ha??ng v????a ta??o va??o session ?????? l??u ta??m.
        if($req->input('num-product')){
            return redirect()->back(); //quay v???? trang hi????n ta??i.
        }else if($req->input('num-product2')){
            return (json_encode($cart));
        }
        
        
        

    }
    public function getProduct($id){ 
        $product = Products::find($id);// t??m ki???m s???n ph???m theo id truy???n v??o.
        return $product; //tr??? s???n ph???m t??m dc x??n view 
    }

    public function getAddtoLike(Request $req,$id){
        
        //dd($req);
        $product = Products::find($id);// t??m ki???m s???n ph???m theo id truy???n v??o.
        // if($req->input('size')){ //kiem tra xxem la co cho??n size khi mua ha??ng kh??ng
        //     $product->size = $req->input('size');//n????u co?? cho??n size thy?? ga??n size ??o?? va??o sa??n ph????m ??ang mua
        // }
        // if($req->input('color')){ //ki????m tra xem la?? co?? cho??n ma??u khi mua ha??ng kh??ng
        //     $product->color =  $req->input('color'); //n????u co?? cho??n ma??u thy?? ga??n ma??u cho sa??n ph????m ??ang mua
        // }
        
        $oldLike = Session('like')?Session::get('like'):null; // ch??? n??y l?? bi???u th???c lu???n l?? , n???u nh?? c?? c??i Session('cart') th??? g??n oldCart =  Session::get('cart') ng?????c l???i g??n oldCart = null . n??y vi???t theo bi???u th???c lu???n l?? cho n?? ng???n g???n chuk vi???t d??i d??ng th??? nh?? v???n nek e.

        // $oldCart = "";  
        // if(Session('cart')){
        //     $oldCart = Session::get('cart');
        // }else{
        //     $oldCart = null;
        // }

        $like = new Like($oldLike);// ta??o gio?? ha??ng m????i (new Cart t????c la?? no?? go??i ca??i file Cart.php no?? cha??y va??o ca??i ha??m __contruct ?????? kh????i ta??o gio?? ha??ng)
        if($req->input('num-product')){ //ki????m tra xem la?? co?? cho??n s???? l??????ng mua ha??ng hay kh??ng
            for($i=0; $i < $req->input('num-product'); $i++){ //n????u co?? thy?? mi??nh duy????t qua s???? l??????ng va?? add no?? va??o gio?? ha??ng. (vi?? du?? cho??n s???? l??????ng la?? 3 thy?? mi??nh du??ng vo??ng l????p for duy????t qa t???? 0,1,2 ?????? th??m sa??n ph????m va??o.)
                $like->add($product,$id); // th??m sa??n ph????m va??o gio?? ha??ng v????a kh????i ta??o.
            }
        }
        $req->session()->put('like',$like); //th??m gio?? ha??ng v????a ta??o va??o session ?????? l??u ta??m.
        return redirect()->back(); //quay v???? trang hi????n ta??i.

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
        return redirect()->back()->with('thongbao','?????t h??ng th??nh c??ng');
       
    } 

    public function getDelItemCart($id) { // ha??m xo??a sa??n ph????m trong gio?? ha??ng
        $oldCart = Session::has('cart')?Session::get('cart'):null; // ch??? n??y l?? bi???u th???c lu???n l?? , n???u nh?? c?? c??i Session('cart') th??? g??n oldCart =  Session::get('cart') ng?????c l???i g??n oldCart = null . n??y vi???t theo bi???u th???c lu???n l?? cho n?? ng???n g???n chuk vi???t d??i d??ng th??? nh?? v???n nek e.
        
       // $oldCart = "";  
       // if(Session('cart')){
       //     $oldCart = Session::get('cart');
       // }else{
       //     $oldCart = null;
       // }
        $cart = new Cart($oldCart); //  
        $cart->removeItem($id); //xo??a sa??n ph????m co?? id ra kho??i gio?? ha??ng
        if(count($cart->items)>0){ // n????u nh?? sau khi xo??a xong mak gio?? ha??ng co??n sa??n ph????m trong ??o?? thy?? mi??nh ga??n la??i session gio?? ha??ng.
            Session::put('cart',$cart); //ga??n la??i gio?? ha??ng
        }
        else{ 
            Session::forget('cart'); // n????u xo??a sa??ch gio?? ha??ng hk co??n sa??n ph????m na??o thy?? xo??a lun ca??i session.
        }
        return redirect()->back(); // quay v???? trang hi????n ta??i.
    }

    public function getSearch(Request $req){
        $product = Products::where('name','like','%'.$req->key.'%')
                            ->orWhere('price',$req->key)
                            ->get();
        $title = "Product";
        return view('page.search',compact('product','title'));
    }

}
