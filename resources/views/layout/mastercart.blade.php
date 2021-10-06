<!DOCTYPE html>
	<html lang="en">
		<head>
				<title>{{ $title}}</title>
				<meta charset="UTF-8">
				<meta name="viewport" content="width=device-width, initial-scale=1">
			<!--===============================================================================================-->	
				<link rel="icon" type="image/png" href="images/icons/favicon.png"/>
			<!--===============================================================================================-->
				<link rel="stylesheet" type="text/css" href="theme/vendor/bootstrap/css/bootstrap.min.css">
			<!--===============================================================================================-->
				<link rel="stylesheet" type="text/css" href="theme/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
			<!--===============================================================================================-->
				<link rel="stylesheet" type="text/css" href="theme/fonts/iconic/css/material-design-iconic-font.min.css">
			<!--===============================================================================================-->
				<link rel="stylesheet" type="text/css" href="theme/fonts/linearicons-v1.0.0/icon-font.min.css">
			<!--===============================================================================================-->
				<link rel="stylesheet" type="text/css" href="theme/vendor/animate/animate.css">
			<!--===============================================================================================-->	
				<link rel="stylesheet" type="text/css" href="theme/vendor/css-hamburgers/hamburgers.min.css">
			<!--===============================================================================================-->
				<link rel="stylesheet" type="text/css" href="theme/vendor/animsition/css/animsition.min.css">
			<!--===============================================================================================-->
				<link rel="stylesheet" type="text/css" href="theme/vendor/select2/select2.min.css">
			<!--===============================================================================================-->	
				<link rel="stylesheet" type="text/css" href="theme/vendor/daterangepicker/daterangepicker.css">
			<!--===============================================================================================-->
				<link rel="stylesheet" type="text/css" href="theme/vendor/slick/slick.css">
			<!--===============================================================================================-->
				<link rel="stylesheet" type="text/css" href="theme/vendor/MagnificPopup/magnific-popup.css">
			<!--===============================================================================================-->
				<link rel="stylesheet" type="text/css" href="theme/vendor/perfect-scrollbar/perfect-scrollbar.css">
			<!--===============================================================================================-->
				<link rel="stylesheet" type="text/css" href="theme/css/util.css">
				<link rel="stylesheet" type="text/css" href="theme/css/main.css">
				<!-- <base href="{{asset(' ')}}"/> -->
			<!--===============================================================================================-->
		</head>
		<body class="animsition" >
			
			@include('layout.header')
			@include('layout.cart')
					

			@yield('content')


			@include('layout.footer')


		
<!--===============================================================================================-->	
<script src="theme/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="theme/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="theme/vendor/bootstrap/js/popper.js"></script>
	<script src="theme/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="theme/vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="theme/vendor/daterangepicker/moment.min.js"></script>
	<script src="theme/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="theme/vendor/slick/slick.min.js"></script>
	<script src="theme/js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script src="theme/vendor/parallax100/parallax100.js"></script>
	<script>
        $('.parallax100').parallax100();
	</script>
<!--===============================================================================================-->
	<script src="theme/vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
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
	<script src="theme/vendor/isotope/isotope.pkgd.min.js"></script>
<!--===============================================================================================-->
	<script src="theme/vendor/sweetalert/sweetalert.min.js"></script>
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
	<script src="theme/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
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
	<script src="theme/js/main.js"></script>

		</body>
	</html>