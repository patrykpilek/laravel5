<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laravel5</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="/css/all.css">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>

    @include('partials.nav')

    <div class="container">
        
        @include('flash::message')
        
        @yield('content')
    </div>

    <script src="/js/all.js"></script>

    @yield('footer')

    <script>
        $('div.alert').not('.alert-important').delay(3000).slideUp(300);
    </script>

</body>
</html>
