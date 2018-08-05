@extends('layouts.master')

@section('title')
	My Profile
@endsection
@section('style')
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	@endsection
@section('content')

	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<h1>My Profile</h1>

			<hr>
			<h2>My Orders</h2>

			@foreach($orders as $order)
				<div class="panel panel-default">
				  <div class="panel-body">
			
				    <ul class="list-group">
				      @foreach($order->cart->products as $product)	
					  	<li class="list-group-item">
					  		<span class="badge">${{ $product['price'] }}</span>
					  		{{ $product['product']->title }} | {{ $product['qty'] }}
					  	</li>
					  @endforeach
					</ul>
								  
				   </div>
				  <div class="panel-footer">Total Price : {{ $order->cart->totalPrice }}</div>
				</div>
			@endforeach
		</div>
		
	</div>

@endsection
