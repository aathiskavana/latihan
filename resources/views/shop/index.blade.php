@extends('layouts.master')

@section('content')

@if (Session::has('success'))
	<div class="row">
		<div class="col-md-4 col-md-offset-3">
			<div class="alert alert-success">
				{{ Session::get('success') }}
			</div>
		</div>
	</div>
@endif

	@foreach ($products->chunk(3) as $productsChunk)
		<div class="row">
		<div class="container">
	@foreach ($productsChunk as $product)
		<div class="col-sm-6 col-md-4">
			<div class="thumbnail">
				<img src="{{ $product->imagePath }}" alt="">
				<div class="caption">
					<h3>{{ $product->title }}</h3>
				<p>{{ $product->description }}</p>
				<div class="clearfix">
				<div class="pull-left price">${{ $product->price }}</div>
					<a href="{{ route('product.AddToCart', ['id' => $product->id]) }}" class="btn btn-success pull-right">Add To Cart</a>
				</div>
				</div>
			</div>	
		</div>
	@endforeach
	</div>
	</div>
	@endforeach
@endsection