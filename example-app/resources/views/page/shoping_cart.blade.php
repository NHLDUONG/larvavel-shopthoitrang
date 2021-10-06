@extends('layout.mastercart')
@section('content')
    <!-- breadcrumb -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!-- <div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Shoping Cart
			</span>
		</div>
	</div> -->
		

	<!-- Shoping Cart -->
	<form class="bg0 p-t-75 p-b-85">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="column-1">Product</th>
									<th class="column-2"></th>
									<th class="column-3">Price</th>
									<th class="column-4">Quantity</th>
									<th class="column-5">Total</th>
								</tr>
								@foreach($cart->items as $product)
								<tr class="table_row">
									<td class="column-1">
										<div class="how-itemcart1">
											<img src="images/{{$product['item']['image']}}" alt="IMG">
										</div>
									</td>

									
									
									<td class="column-2">{{$product['item']['name']}}</td>
									<td class="column-3">{{number_format($product['item']['price_sale'])}} $</td>
									<td class="column-4">
										<div class="wrap-num-product flex-w m-l-auto m-r-0">
											<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>

											<input id="num_{{$product['item']['id']}}" class="mtext-104 cl3 txt-center num-product" type="number" name="num-product2" value="{{$product['qty']}}">

											<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
										</div>
									</td>
									<td id="total_{{$product['item']['id']}}" class="column-5">{{$product['qty']*number_format($product['item']['price_sale'])}} $</td>
									<!-- chỗ này tạo id = với id của sản phẩm , mục đích là khi ajax trả về nó dựa vào id nó set lại giá. --> 
								</tr>
								@endforeach
							</table>
						</div>

						<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
							<div class="flex-w flex-m m-r-20 m-tb-5">
								<input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text" name="coupon" placeholder="Coupon Code">
									
								<div class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
									Apply coupon
								</div>
							</div>

							<div id="updatecart" class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
								Update Cart
							</div>
						</div>
					</div>
				</div>

				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Cart Totals
						</h4>

						<div class="flex-w flex-t bor12 p-b-13">
							<div class="size-208">
								<span class="stext-110 cl2">
									Subtotal:
								</span>
							</div>

							<div class="size-209">
								<span class="mtext-110 cl2">
									{{$cart->totalPrice}}  $
								</span>
							</div>
						</div>

						<div class="flex-w flex-t bor12 p-t-15 p-b-30">
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Shipping:
								</span>
							</div>

							<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
								<p class="stext-111 cl6 p-t-2">
									There are no shipping methods available. Please double check your address, or contact us if you need any help.
								</p>
								
								<div class="p-t-15">
									<span class="stext-112 cl8">
										Calculate Shipping
									</span>

									<div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
										<select onchange="selectTinh()" id="tinh" class="js-select2" name="tinh"> <!-- chỗ này là khi chọn tỉnh thỳ mình sẽ biết được tỉnh đang chọn sau đó mình lấy ra những huyện thuộc tỉnh đó. -->
											<option>Chọn Tỉnh/Thành phố</option>
										</select>
										<div class="dropDownSelect2"></div>
									</div>

									<div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
										<select onchange="selectHuyen()" id="huyen" class="js-select2" name="huyen"> <!-- chỗ này là khi chọn tỉnh thỳ mình sẽ biết được tỉnh đang chọn sau đó mình lấy ra những huyện thuộc tỉnh đó. -->
											<option>Chọn Quận/Huyện</option>
										</select>
										<div class="dropDownSelect2"></div>
									</div>

									<div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
										<select id="xa" class="js-select2" name="xa"> <!-- chỗ này là khi chọn tỉnh thỳ mình sẽ biết được tỉnh đang chọn sau đó mình lấy ra những huyện thuộc tỉnh đó. -->
											<option>Chọn Phường/Xã</option>
										</select>
										<div class="dropDownSelect2"></div>
									</div>	
									<div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
										<div id="note" class="js-select2" name="xa"> <!-- chỗ này là khi chọn tỉnh thỳ mình sẽ biết được tỉnh đang chọn sau đó mình lấy ra những huyện thuộc tỉnh đó. -->
											<input type="text" placeholder="Nhập số nhà, tên đường cụ thể">
										</div>
										<div class="dropDownSelect2"></div>
									</div>									
									
									<div class="flex-w">
										<div class="flex-c-m stext-101 cl2 size-115 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer">
											Update Totals
										</div>
									</div>
										
								</div>
							</div>
						</div>

						<div class="flex-w flex-t p-t-27 p-b-33">
							<div class="size-208">
								<span class="mtext-101 cl2">
									Total:
								</span>
							</div>

							<div class="size-209 p-t-1">
								<span class="mtext-110 cl2">
								{{$cart->totalPrice}}  $
								</span>
							</div>
						</div>

						<button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
							Proceed to Checkout
						</button>
					</div>
				</div>
			</div>
		</div>
	</form>

	<script>
		var dataVietNam = "";
		var districtChoose = "";
		fetch("../public/jsonData/local.json") // lấy data json ra trong file json đã có.
		.then(response => response.json())
		.then((json) => {
			dataVietNam = json;//gán vào biến dataVietnam để sài sau.
			var option = "<option value=''>Chọn Tỉnh / Thành </option>"; // khởi tạo thẻ option trong select đầu tiên.
			json.forEach(element => {
				option += "<option value='"+element.id+"'>" + element.name + "</option>" // nối những option lại với nhau // hô chí minh, hà nội, ....
			});
			console.log(option);
			$("#tinh").html(option)
		});

		function selectTinh(){ //hàm chọn tỉnh 
			var data = dataVietNam.find(element => element.id === $("#tinh").val())  //dùng dataVietnam lúc nảy gán để mình dùng.
			districtChoose = data; //sau khi chọn option thy minh gán nó vao huyện. chỗ nay nếu tỉnh chọn hồ chí minh, thỳ chỗ này sẽ là những quận của hồ chí minh như bình chánh, bình tân, ....
			var district = "";
			if(data && data.districts.length > 0){
				data.districts.forEach(function(element) {
					district += '<option value='+element.id+'>' +element.name+ '</option>' //những huyện nằm trong tỉnh dc chọn
				})
				$("#huyen").html(district);//gán vào select huyện
			}
		}

		function selectHuyen(){ // khi chọn quận huyện // bình tân hay bình chánh ,.....
			var data = districtChoose.districts.find(element => element.id === $("#huyen").val())
			var xa = "";
			if(data && data.wards.length > 0){
				data.wards.forEach(function(element) {
					xa += '<option value='+element.code+'>' +element.name+ '</option>' //những xã nằm trong huyện được chọn
				})
				$("#xa").html(xa); //gán vào select xã
			}
		}

		$("#updatecart").click(function(){

			//lấy sản phẩm trong giỏ hàng.
			var giohang = '<?php echo json_encode($cart) ?>';
			console.log(JSON.parse(giohang).items);
			var giohang = JSON.parse(giohang).items;

			console.log(giohang.length);

			
			$.each(JSON.parse(giohang).items,function(index,obj)
			{

				//console.log('id', obj.item.id);

				$.ajax({
					url : 'add-to-cart/'+index,
					type : 'GET',
					data : {
						'num-product2' : $("#num_"+obj.item.id).val()
					},
					//dataType:'json',
					success : function(data) {    
						console.log(data)          
						$.each(JSON.parse(data).items,function(index, item){
							$("#total_"+index).html(item.price);
						});
					},
					error : function(request,error)
					{
						console.log("Request: "+JSON.stringify(request));
					}
				});
			});
			
		});

		
		
	</script> 
@endsection