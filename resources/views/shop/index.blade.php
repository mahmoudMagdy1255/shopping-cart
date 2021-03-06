@extends('layouts.master')

@section('title')
	Yaro
@endsection

@section('style')
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	@endsection
	
@section('content')
	<div class="row">
		<div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
			@if(Session::has('success'))
				<div id="charge-message" class="alert alert-success">
					{{ Session::get('success') }}
				</div>
			@endif

			@if(Session::has('error'))
				<div id="charge-message" class="alert alert-danger">
					{{ Session::get('error') }}
				</div>
			@endif
		</div>	
	</div>
	
	@foreach( array_chunk($products, 3) as $productChunck)
		<div class="row">
			@foreach($productChunck as $product)
				<div class="col-sm-6 col-md-4">
					<div class="thumbnail">
						  <img src="{{ $product->image }}" class="img-responsive" alt="...">

					      <div class="caption">
					        <h3>{{ $product->title }}</h3>
					        <p class="description">
						        {{ $product->description }}
						    </p>
					        <div class="clearfix">
					        	<div class="pull-left price">${{ $product->price }} </div>
					        	<a href="{{ route('cart.add' , ['id' => $product->id]) }}" class="btn btn-success pull-right" role="button">Add To Cart</a>
					        </div>
					      </div>
					</div>
				</div>
			@endforeach
		</div>
	@endforeach

@endsection

@section('footer')
	@include('partials.footer')
@endsection