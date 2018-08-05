@extends('layouts.master')
@section('style')
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	@endsection

@section('title')
	Yaro Checkout
@endsection

@section('style')

<link rel="stylesheet" type="text/css" href="{{ URL::to('css/checkout.css') }}">

@endsection

@section('content')
	<div class="row">
		<div class="col-sm-6 col-md-6  col-md-offset-3 col-sm-offset-3">
			
			<h1>Checkout</h1>
			<h4>Total: ${{ $total }}</h4>

			<form action="{{ route('cart.checkout') }}" method="POST" id="checkout-form">
					
					{{ csrf_field() }}	

					<div class="row">

						<div class="col-xs-12">
							<div class="form-group">
								<label for="name">Name</label>
								<input type="text" class="form-control stripeElement stripeElement--empty" name="name" id="name" required >
							</div>
						</div>

						<div class="col-xs-12">
							<div class="form-group">
								<label for="address">Address</label>
								<select name="address" id="address" class="form-control">
									@foreach($countries as $country)
										<option value="{{ $country }}">{{ $country }}</option>
									@endforeach
								</select>
							</div>
						</div>
						

						<div class="col-xs-12">
							<label for="card-element">Credit Or Debit Card </label>
								<div id="card-element" class="form-control stripeElement stripeElement--empty">
								
								</div>

								<div id="card-errors" role="alert">
								
								</div>
						</div>

					</div>

					<input type="submit" class="btn btn-success" style="margin-top: 30px;" id="button" value="Buy Now">
			</form>

		</div>
	</div>
@endsection

@section('scripts')
	<script src="https://js.stripe.com/v3/"></script>
	<script src= {{ URL::to("js/checkout.js") }}> </script>
@endsection