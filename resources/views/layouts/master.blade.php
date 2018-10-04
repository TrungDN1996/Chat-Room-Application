<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>Chat Room</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="{{ asset('css/library/bootstrap.min.css') }}">
		<link rel="stylesheet" href='{{ asset('css/library/font.css') }}'>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
		<link rel="stylesheet prefetch" href='{{ asset('css/library/reset.min.css') }}'>
		<link rel="stylesheet" href="{{ asset('css/library/style.css') }}">

	</head>
	<body>
		<div class="container">
			@yield('content')
		</div>

		<!-- jQuery -->
		<script src="{{ asset('js/library/popper.min.js') }}"></script>
		<script src="{{ asset('js/library/jquery-3.2.1.slim.min.js') }}"></script>
		<script src="{{ asset('js/library/bootstrap.min.js') }}"></script>
		<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
		
		<script src="https://use.typekit.net/hoy3lrg.js"></script>
		<script>
			try{Typekit.load({ async: true });}catch(e){}
		</script>
		@yield('js')

	</body>
</html>