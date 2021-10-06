<!DOCTYPE html>
	<html lang="en">
		<head>
				<title>{{ $title}}</title>
				<meta charset="UTF-8">
				<meta name="viewport" content="width=device-width, initial-scale=1">
			<!--===============================================================================================-->	
				<link rel="icon" type="image/png" href="images/icons/favicon.png"/>
			<!--===============================================================================================-->
				<link rel="stylesheet" type="text/css" href="{{url('/')}}/theme/vendor/bootstrap/css/bootstrap.min.css">
			<!--===============================================================================================-->
				<link rel="stylesheet" type="text/css" href="{{url('/')}}/theme/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
			<!--===============================================================================================-->
				<link rel="stylesheet" type="text/css" href="{{url('/')}}/theme/fonts/iconic/css/material-design-iconic-font.min.css">
			<!--===============================================================================================-->
				<link rel="stylesheet" type="text/css" href="{{url('/')}}/theme/fonts/linearicons-v1.0.0/icon-font.min.css">
			<!--===============================================================================================-->
				<link rel="stylesheet" type="text/css" href="{{url('/')}}/theme/vendor/animate/animate.css">
			<!--===============================================================================================-->	
				<link rel="stylesheet" type="text/css" href="{{url('/')}}/theme/vendor/css-hamburgers/hamburgers.min.css">
			<!--===============================================================================================-->
				<link rel="stylesheet" type="text/css" href="{{url('/')}}/theme/vendor/animsition/css/animsition.min.css">
			<!--===============================================================================================-->
				<link rel="stylesheet" type="text/css" href="{{url('/')}}/theme/vendor/select2/select2.min.css">
			<!--===============================================================================================-->	
				<link rel="stylesheet" type="text/css" href="{{url('/')}}/theme/vendor/daterangepicker/daterangepicker.css">
			<!--===============================================================================================-->
				<link rel="stylesheet" type="text/css" href="{{url('/')}}/theme/vendor/slick/slick.css">
			<!--===============================================================================================-->
				<link rel="stylesheet" type="text/css" href="{{url('/')}}/theme/vendor/MagnificPopup/magnific-popup.css">
			<!--===============================================================================================-->
				<link rel="stylesheet" type="text/css" href="{{url('/')}}/theme/vendor/perfect-scrollbar/perfect-scrollbar.css">
			<!--===============================================================================================-->
				<link rel="stylesheet" type="text/css" href="{{url('/')}}/theme/css/util.css">
				<link rel="stylesheet" type="text/css" href="{{url('/')}}/theme/css/main.css">
				<!-- <base href="{{asset(' ')}}"/> -->
			<!--===============================================================================================-->
		</head>
		<!-- <body onload="thongbaopopup()" >-->
		<body>
			@include('layout.header')
			@include('layout.cart')
			@include('layout.slider')			

			@yield('content')


			@include('layout.footer')


		
<!--===============================================================================================-->	
<script src="{{url('/')}}/theme/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="{{url('/')}}/theme/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="{{url('/')}}/theme/vendor/bootstrap/js/popper.js"></script>
	<script src="{{url('/')}}/theme/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="{{url('/')}}/theme/vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="{{url('/')}}/theme/vendor/daterangepicker/moment.min.js"></script>
	<script src="{{url('/')}}/theme/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="{{url('/')}}/theme/vendor/slick/slick.min.js"></script>
	<script src="{{url('/')}}/theme/js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script src="{{url('/')}}/theme/vendor/parallax100/parallax100.js"></script>
	<script>
        $('.parallax100').parallax100();
	</script>
<!--===============================================================================================-->
	<script src="{{url('/')}}/theme/vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
		        delegate: 'a', // the selector for gallery item
		        type: 'image',
		        gallery: {
		        	enabled:true
		        },
		        mainClass: 'mfp-fade'
		    });
		});
	</script>
<!--===============================================================================================-->
	<script src="{{url('/')}}/theme/vendor/isotope/isotope.pkgd.min.js"></script>
<!--===============================================================================================-->
	<script src="{{url('/')}}/theme/vendor/sweetalert/sweetalert.min.js"></script>
	<script>
		$('.js-addwish-b2').on('click', function(e){
			e.preventDefault();
		});

		$('.js-addwish-b2').each(function(){
			var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-b2');
				$(this).off('click');
			});
		});

		$('.js-addwish-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-detail');
				$(this).off('click');
			});
		});

		/*---------------------------------------------*/



		$('.js-addcart-detail').each(function(){ //click vào nút mua hàng sẽ vào chỗ này.
			var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
			$(this).on('click', function(){

				//console.log("this", this.id); //log id sản phẩm mua ra xem.
				// vì này là popup nên khi mình mua hàng phải sử dụng ajax  lun.




				swal(nameProduct, "is added to cart111 !", "success"); 
			});
		});
	
	</script>
<!--===============================================================================================-->
	<script src="{{url('/')}}/theme/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>
<!--===============================================================================================-->
	<script src="{{url('/')}}/theme/js/main.js"></script>
	<!--
	<script type="text/javascript">
		$(document).ready(function () {
			//to disable the entire page
			$("body").on("contextmenu",function(e){
				alert("cấm chuột phải");
				return false;
			});
			
			//to disable a section
			$("#id").on("contextmenu",function(e){
				alert("cấm chuột phải"); 
				return false;
			});
		});
	</script>
	-->

	<!--<script type="text/javascript">
	$(document).ready(function () {
		//to disable the entire page 
		$('body').bind('cut copy paste', function (e) {
			alert("cấm copy ");
			e.preventDefault();
		});
		
		//to disable a section
		$('#id').bind('cut copy paste', function (e) {
			alert("cấm copy ");
			e.preventDefault();
		});
	});
	</script>-->
	<!-- Thong bao pupup -->
	<!-- <div class="tbpopup" id="tbpopup-1">
		<div class="tboverlay"></div>
		<div class="tbcontent">
			<div class="tbclose-btn" onclick="thongbaopopup()">&times;</div>
			<div style="font-size:30px;font-weight:bold;color:red">Sale Off</div>
			<p style="color:blue">Khuyến mãi tri ân khách hàng cũ</p>
			<p style="color:yellow">Giảm 50%</p>
		</div>
	</div> -->




	<!--Your Plugin chat code
	<div id="fb-customer-chat" class="fb-customerchat">
	</div>

	<script>
	var chatbox = document.getElementById('fb-customer-chat');
	chatbox.setAttribute("page_id", "102967148828418");
	chatbox.setAttribute("attribution", "biz_inbox");

	window.fbAsyncInit = function() {
		FB.init({
		xfbml            : true,
		version          : 'v12.0'
		});
	};

	(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
	</script>-->

			<!-- zalopages -->
				<div class="zalo-chat-widget" data-oaid="3352431969490981124" data-welcome-message="Rất vui khi được hỗ trợ bạn!" data-autopopup="1" data-width="300" data-height="300"></div>
				<script src="https://sp.zalo.me/plugins/sdk.js"></script> 
			<!-- end zalopages -->
		</body>
	</html>