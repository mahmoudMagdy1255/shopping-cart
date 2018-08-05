@extends('layouts.master')

@section('title')
	Sign Up To Yaro
@endsection

@section('style')
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	@endsection

@section('content')

	<div class="row">
		<div class="col-md-4 col-md-offset-4">
		<h1>Sign Up</h1>

		@if($errors->any())
			<div class="alert alert-danger">
				@foreach($errors->all() as $error )
					<p>{{ $error }}</p>
				@endforeach			
			</div>
		@endif
		<form action="{{ route('user.signup') }}" method="POST">
			{{ csrf_field() }}
			
			<div class="form-group">
				<label for="name">Name</label>
				<input type="text" name="name" class="form-control">
			</div>

			<div class="form-group">
				<label for="email">E-Mail</label>
				<input type="email" name="email" class="form-control">
			</div>

			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" name="password" class="form-control">
			</div>

			<div class="form-group">
				<label for="confirmed_password">Confirm Password</label>
				<input type="password" name="confirmed_password" class="form-control">
			</div>

			<button type="submit" class="btn btn-primary">Sign Up</button>
		</form>
		<p>You Have An Account? <a href="{{ route('user.signin') }}">Sign In</a> </p>
		</div>
	</div>

@endsection