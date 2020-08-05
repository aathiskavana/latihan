@extends('layouts.master')

@section('content')
@include('layouts.alert')
	<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<div class="panel panel-info">
			<div class="panel-heading">
				<h3 id="text">Masuk</h3>
			</div>
			<div class="panel-body">
			<form action="{{ route('user.signin') }}" method="POST">
				<div class="form-group">
					<input type="email" name="email" id="email" class="form-control" placeholder="Email">
				</div>
				<div class="form-group">
					<input type="password" name="password" id="password" class="form-control" placeholder='Password'>
				</div>
					<button type="submit" class="btn btn-block btn-primary">
						Masuk
					</button>
					{{ csrf_field() }}
			</form>
		</div>
			</div>
		</div>
	</div>
@stop
