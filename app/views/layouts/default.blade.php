<!doctype html>
<html>
<head>
	@include('includes.head')
</head>
<body>
	<div class="container">

        <div class="navbar navbar-default navbar-fixed-top" role="navigation">
			@include('includes.header')
		</div>

        <div id="main" class="container">

			@yield('content')

		</div>

        <div class="navbar navbar-default navbar-fixed-bottom">
				@include('includes.footer')
		</div>

	</div>
</body>
</html>