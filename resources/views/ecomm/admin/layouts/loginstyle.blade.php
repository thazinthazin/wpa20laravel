<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
	<link rel="stylesheet" href="{{asset('src/css/bootstrap.min.css')}}">	
</head>
<body>
	<div class="container">
		<div class="row">
			@yield('content')
		</div>		
	</div>
</body>
</html>