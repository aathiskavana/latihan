@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h2 style="text-align:center;">Payments</h2>
				</div>
				<div class="panel-body">
				<h4>Total: ${{ $total }}</h4>
				<form action="{{ route('checkout') }}" method="post" id="checkout-form">
				
				<div id="charge-error" class="alert alert-danger {{ !Session::has('error') ? 'hidden' : '' }}">
					{{ Session::get('error') }}	
				</div>

					<div class="row">
						<div class="col-md-12">
							<label for="Name">Name</label>
							<input type="text" name="name" id="name" class="form-control" required>
						</div>	
					</div>
					<div class="row">
						<div class="col-md-12">
							<label for="Address">Address</label>
							<input type="text" name="address" id="address" class="form-control" required>
						</div>	
					</div>
					<div class="row">
						<div class="col-md-12">
							<label for="Card">Card Holder Name</label>
							<input type="text" name="card-name" id="card-name" class="form-control" required>
						</div>	
					</div>
					<div class="row">
						<div class="col-md-12">
							<label for="Credit-number">Credit Card Number</label>
							<input type="text" name="card-number" id="card-number" class="form-control" required>
						</div>	
					</div>
					<div class="row">
						<div class="col-md-6">
							<label for="expiry-month">Expiration Month</label>
							<input type="text" name="card-expiry-month" id="card-expiry-month" class="form-control" required>
						</div>
						<div class="col-md-6">
							<label for="expiry-year">Expiration Year</label>
							<input type="text" name="card-expiry-year" id="card-expiry-year" class="form-control" required>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<label for="cvc">Cvc</label>
							<input type="text" name="card-cvc" id="card-cvc" class="form-control" required>
						</div>
					</div>
					<br>
						<div class="row">
							<div class="col-md-3">
							  <button type="submit" class="btn btn-success">Buy Now</button>
							</div>
						</div>
						{{ csrf_field() }}
						
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('script')
	<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
	<script type="text/javascript" src="{{ URL::to('js/checkout.js') }}"></script>
@endsection