<nav class="navbar navbar-default navbar-static-top" role="navigation">
	<div class="container">
		<a class="navbar-brand" href="{{ route('shop.index') }}">LaraShop</a>
		<ul class="nav navbar-nav navbar-right">
		<li><a href="{{ route('product.ShoppingCart') }}"><i class="fa fa-shopping-cart"></i> Cart <span class="badge">{{ Session::has('cart') ? Session::get('cart')->totalQty : ''  }}</span></a>
			</li>
			@if (Auth::user())
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Bangadam <i class="caret"></i></a>
				<ul class="dropdown-menu">
					<li><a href="{{ route('user.profile') }}"><i class="fa fa-user"></i> Profile</a></li>
					<li class="divider" role="separator"></li>
					<li><a href="{{ route('user.logout') }}"><i class="fa fa-sign-out"></i> Logout</a></li>
				</ul>
			</li>
			@else 
			<li><a href="{{ route('user.signin') }}"><span>Signin</span></a></li>
			<li><a href="{{ route('user.signup') }}"><span>Signup</span></a></li>
			@endif
		</ul>
	</div>
</nav>