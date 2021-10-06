<!-- Header -->
<header>
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<!-- Topbar -->
			<div class="top-bar">
				<div class="content-topbar flex-sb-m h-full container">
					<div class="left-top-bar">
						Free shipping for standard order over $100
					</div>

					<div class="right-top-bar flex-w h-full">
						
						<a href="#" class="flex-c-m trans-04 p-lr-25">
							Help & FAQs
						</a>
						@if(Auth::check())
						<a href="" class="flex-c-m trans-04 p-lr-25">
							Chào {{Auth::user()->name}}
						</a>
						<a href="logout" class="flex-c-m trans-04 p-lr-25">
							Logout
						</a>
						@else
						<a href="signin" class="flex-c-m trans-04 p-lr-25">
							Signin
						</a>
						<a href="login" class="flex-c-m trans-04 p-lr-25">
							Login
						</a>
						@endif
					</div>
				</div>
			</div>

			<div class="wrap-menu-desktop">
				<nav class="limiter-menu-desktop container">
					
					<!-- Logo desktop -->		
					<a href="#" class="logo">
						<img src="images/icons/logo-01.png" alt="IMG-LOGO">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							@foreach($menu as $mn)
							<li class="active-menu">
								<a href="{{$mn->link}}">{{$mn->name}}</a>
								<!-- <ul class="sub-menu">
									<li><a href="index">Homepage 1</a></li>
									<li><a href="home-02">Homepage 2</a></li>
									<li><a href="home-03">Homepage 3</a></li>
								</ul> -->
							</li>

							@endforeach
						</ul>
					</div>	

					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m">
						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
							<i class="zmdi zmdi-search"></i>
						</div>





						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="@if(Session::has('cart')){{Session('cart')->totalQty}} @else 0 @endif">
							<i class="zmdi zmdi-shopping-cart"></i>
						</div>





						<a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" data-notify="@if(Session::has('like')){{Session('like')->totalQty}} @else 0 @endif">
							<i class="zmdi zmdi-favorite-outline"></i>
						</a>
					</div>
				</nav>
			</div>	
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->		
			<div class="logo-mobile">
				<a href="index"><img src="images/icons/logo-01.png" alt="IMG-LOGO"></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">
				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
					<i class="zmdi zmdi-search"></i>
				</div>

				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="2">
					<i class="zmdi zmdi-shopping-cart"></i>
				</div>

				<a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti" data-notify="0">
					<i class="zmdi zmdi-favorite-outline"></i>
				</a>
			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<!-- Menu Mobile -->
		<div class="menu-mobile">
			<ul class="topbar-mobile">
				<li>
					<div class="left-top-bar">
						Free shipping for standard order over $100
					</div>
				</li>

				<li>
					<div class="right-top-bar flex-w h-full">
						<a href="#" class="flex-c-m p-lr-10 trans-04">
							Help & FAQs
						</a>

						<a href="signin" class="flex-c-m trans-04 p-lr-25">
							Signin
						</a>
						<a href="login" class="flex-c-m trans-04 p-lr-25">
							Login
						</a>
					</div>
				</li>
			</ul>

			<ul class="main-menu-m">
				@foreach($menu as $mn)
				<li>
					<a href="{{$mn->link}}">{{$mn->name}}</a>
					<!-- <ul class="sub-menu-m">
						<li><a href="index">Homepage 1</a></li>
						<li><a href="home-02">Homepage 2</a></li>
						<li><a href="home-03">Homepage 3</a></li>
					</ul> -->
					<span class="arrow-main-menu-m">
						<i class="fa fa-angle-right" aria-hidden="true"></i>
					</span>
				</li>
				@endforeach
				
			</ul>
		</div>

		<!-- Modal Search -->
		<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<div class="container-search-header">
				<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
					<img src="images/icons/icon-close2.png" alt="CLOSE">
				</button>

				<form role="search" method="get" action="{{route('search')}}" class="wrap-search-header flex-w p-l-15">
					<button class="flex-c-m trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>
					<input class="plh3" type="text" name="key" placeholder="Search...">
				</form>
			</div>
		</div>
	</header>
		@include('layout.cart')