@extends('layouts.master')

@section('content')
 @if(Session::has('cart'))
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<ul class="list-group">
				@foreach($products as $product)
					<li class="list-group-item">
						<span class="badge">{{ $product['qty'] }} Units</span>
						<strong>{{ $product['item']['title'] }}</strong>
						<span class="label label-success">${{ $product['price'] }}</span>
						<div class="btn-group">
							<button class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>

							<ul class="dropdown-menu">
								<li><a href="{{ route('product.getReduceByOne', ['id' => $product['item']['id']]) }}">Reduce by 1</a></li>
								<li><a href="{{ route('product.RemoveItem', ['id' => $product['item']['id']]) }}">Reduce All</a></li>
							</ul>
						</div>
					</li>
				@endforeach
			</ul>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<strong>Total: ${{ $totalPrice }}</strong>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-6 col-md-offset-8">
			<a href="{{ route('checkout') }}" class="btn btn-success">Checkout</a>
		</div>
	</div>

	@else
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<h2>No Item in Cart !</h2>
		</div>
	</div>
	@endif


@endsection