<!-- Cart -->
	<div class="wrap-header-cart js-panel-cart">
		<div class="s-full js-hide-cart"></div>

		<div class="header-cart flex-col-l p-l-65 p-r-25">
			<div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					Your Cart (@if(Session::has('cart')){{Session('cart')->totalQty}} @else 0 @endif)
				</span>
			
				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>
			@if(Session::has('cart'))
			@foreach($product_cart as $product)
			<div class="header-cart-content flex-w js-pscroll">
				<ul class="header-cart-wrapitem w-full">
					<li class="header-cart-item flex-w flex-t m-b-12">
						<a href="{{route('xoagiohang',$product['item']['id'])}}" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
							<div class="header-cart-item-img">
								<img src="images/{{$product['item']['image']}}" alt="IMG">
							</div>
						</a>
						<div class="header-cart-item-txt p-t-8">
							<span class="header-cart-item-info">
								{{$product['item']['name']}}
							</span>
							<span class="header-cart-item-info">
							 	Size: {{$product['item']['size']}}
							</span>
							<span class="header-cart-item-info">
								Color: {{$product['item']['color']}}
							</span>
							<span class="header-cart-item-info">
								<span>Price: {{$product['qty']}} * {{number_format($product['item']['price_sale'])}} = {{$product['qty']*number_format($product['item']['price_sale'])}} $</span>
							</span>
						</div>
					</li>

				</ul>
			</div>
			@endforeach
				
				<div class="w-full">
					<div class="header-cart-total w-full p-tb-40">
					
						Total: {{Session('cart')->totalPrice}}  $
					</div>

					<div class="header-cart-buttons flex-w w-full">
						<a href="shoping-cart.html" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
							View Cart
						</a>

						<a href="{{route('dathang')}}" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
							Đặt hàng
						</a>
					</div>
				</div>
			</div>
			@endif
		</div>
	</div>
    
