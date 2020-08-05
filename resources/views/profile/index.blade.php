@extends('layouts.master')

@section('content')

	<div class="row">
		<div class="col-md-6 col-md-offset-3">
		<h1>My Orders</h1>
		@foreach($orders as $order)
			<div class="panel panel-info">
				@foreach($order->cart->items as $items)
				<div class="panel-body">
					<ul class="list-group">
						<li class="list-group-item">
							<span class="badge">${{ $items['price'] }}</span>
							{{ $items['item']['title'] }} | {{ $items['qty'] }} Units
						</li>
					</ul>
				</div>
				@endforeach
				<div class="panel-footer">
				Total Price ${{ $order->cart->totalPrice }}
				</div>
			</div>
			<hr>
		@endforeach
		</div>
	</div>
@endsection