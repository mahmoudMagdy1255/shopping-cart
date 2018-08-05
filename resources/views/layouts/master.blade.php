<!DOCTYPE html>
<html>
<head>
	<title> @yield('title') </title>

	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.1/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	
	@yield('style')

	<link rel="stylesheet" type="text/css" href="{{ URL::to('css/app.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ URL::to('css/header.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ URL::to('css/footer.css')}}">

	
</head>
<body>

@include('partials.header');

<div class="container">
	@yield('content');
</div>

@yield('footer');

<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script type="text/javascript"  src="{{ URL::to('js/header.js') }}"></script>
@yield('scripts');

</body>
</html>