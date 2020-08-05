@if (Session::has('pesan'))
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="alert alert-info">
				<p>{{ Session::get('pesan') }}</p>
			</div>
		</div>
	</div>
@endif