<?php

namespace App;

class Like //tạo 1 đối tượng cart
{
	public $items = null; //thuộc tính items để lưu trữ product (productName, productID, productPrice, .......)
	public $totalQty = 0; //số lượng sản phẩm đã mua.
	public $totalLike = 0; //tổng tiền đã mua sản phẩm.

	public function __construct($oldLike){ //Phương thức khởi tạo
		if($oldLike){ // kiểm tra trong giỏ hàng đã có chưa
			$this->items = $oldLike->items; //gán lại sản phẩm
			$this->totalQty = $oldLike->totalQty;
			$this->totalPrice = $oldLike->totalPrice;
		}
	}
 
	public function add($item, $id){// hàm thêm 1 sản phẩm
		//dd($item);
		
		$luotlike = ['qty'=>0, 'price' => $item->price_sale, 'item' => $item]; // qty=>tạo giỏ hàng gồm có  số lần mua sản phẩm , price=>giá của sản phẩm, item => là những thuộc tinhscuar sản phẩm đang mua (tên sản phẩm, giá sp, mã sp, .....) 
		if($item->size){ // lúc nảy bên PagesController nó có chỗ thêm cái size vào sản phẩm thỳ chỗ này là kiểm tra xem thử là có size không.
			$luotlike['size'] = $item->size; //nếu sản phẩm mua có size thỳ gán size đó vào giỏ hàng.
		}
		if($item->color){ // lúc nảy bên PagesController nó có chỗ thêm cái color vào sản phẩm thỳ chỗ này là kiểm tra xem thử là có color không.
			$luotlike['color'] = $item->color; //nếu sản phẩm mua có color thỳ gán color đó vào giỏ hàng.
		}
		//dd($luotlike);
//die();
		if($this->items){ // kiểm tra nếu như trong giỏ hàng đã có sản phẩm (tức là khi mua sản phẩm a , sau đó mua thêm sản phẩm a nữa thỳ sẽ vô if này)
			if(array_key_exists($id, $this->items)){
				$luotlike = $this->items[$id]; // nếu như sản phẩm này đã dc mua rồi thỳ chỉ cần gán lại giỏ hàng.
			}
		}
		$luotlike['qty']++; // tăng số lượng sản phẩm trong giỏ hàng lên 1.
		$luotlike['price'] = $item->price_sale * $luotlike['qty']; // tính giá sản phẩm bằng cách lấy số lượng sản phẩm đã mua nhân với đơn giá của sản phẩm.
		$this->items[$id] = $luotlike; // gán lại id giỏ hàng.
		$this->totalQty++; // tính tổng số lượng sản phẩm 
		$this->totalPrice += $item->price_sale; // tính tổng tiền của nhung sản phẩm đã mua
	}
	//xóa 1
	public function reduceByOne($id){ // hàm này là xóa 1 sản phẩm ra khỏi giỏ hàng (ví dụ như e mua 3 sản phẩm gồm có sp1 mua 2 lần, giá 100 thỳ sẽ là 200k, và sp1 mua 1 lần giá 300k, thực hiện xóa sản phẩm a trong giỏ hàng)
		$this->items[$id]['qty']--; // trừ ra 1 sản phẩm trong giỏ hàng(xóa số lượng sản phẩm a xún tức là 2-1 còn 1)
		$this->items[$id]['price'] -= $this->items[$id]['item']['price']; // trừ ra số tiền của sản phẩm (tức là 200 - 100 còn 100k)

		$this->totalQty--; // trừ tổng số lượng trong giỏ hàng (3-1 còn 2)
		$this->totalPrice -= $this->items[$id]['item']['price']; //trừ tồng tiền trong giỏ hàng(500 - 100  còn 400k)
		if($this->items[$id]['qty']<=0){// nếu sản phẩm đó còn trong giỏ hàng( 2-1 còn 1 nên if này là đúng)
			unset($this->items[$id]); // xóa sản phẩm ra khỏi giỏi hàng 
		}
		// tức là e mua 3 sản phẩm và tổng tiền là 500k thỳ qa hàm này sẽ còn 2 sản phẩm và 400k
	}
	//xóa nhiều
	public function removeItem($id){//hàm xxoas tất cả sản phẩm có trong giỏ hàng
		$this->totalQty -= $this->items[$id]['qty'];// xóa số lượng về 0;
		$this->totalPrice -= $this->items[$id]['price']; // xóa giá về 0;
		unset($this->items[$id]); // xoá sản phẩm ra khỏi giỏ hàng.
	}
}
