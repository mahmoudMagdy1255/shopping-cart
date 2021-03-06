@extends('layouts.master')

@section('title')
	Sign In To Yaro
@endsection

@section('style')
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	@endsection

@section('content')

	<div class="row">
		<div class="col-md-4 col-md-offset-4">
		<h1>Sign In</h1>

		@if($errors->any())
			<div class="alert alert-danger">
				@foreach($errors->all() as $error )
					<p>{{ $error }}</p>
				@endforeach			
			</div>
		@endif
		<form action="{{ route('user.signin') }}" method="POST">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="email">E-Mail</label>
				<input type="email" name="email" name="email" class="form-control">
			</div>

			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" name="password" name="password" class="form-control">
			</div>

			<button type="submit" class="btn btn-primary">Sign In</button>
		</form>
		<p>Don't Have Account? <a href="{{ route('user.signin') }}">Sign Up</a> </p>
		</div>
	</div>

@endsection