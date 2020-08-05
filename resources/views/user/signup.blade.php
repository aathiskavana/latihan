@extends('layouts.master')
@section('content')
@include('layouts.alert')
	<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<div class="panel panel-info">
			<div class="panel-heading">
				<h3 id="text">Daftar</h3>
			</div>
			<div class="panel-body">
			<form action="{{ route('user.signup') }}" method="post">
				<div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
					<input type="text" name="username" id="username" class="form-control" placeholder="Username">
				</div>
				<div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
					<input type="email" name="email" id="email" class="form-control" placeholder="Email">
				</div>
				<div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
					<input type="password" name="password" id="password" class="form-control" placeholder='Password'>
				</div>
					<button type="submit" name="daftar" class="btn btn-block btn-primary">
						Daftar
					</button>
					{{ csrf_field() }}
			</form>
		</div>
			</div>
		</div>
	</div>
@stop
