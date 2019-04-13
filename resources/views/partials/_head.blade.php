<head>
  <title>{{config('app.name')}} @yield('title')</title>
  <meta charset="UTF-8">
  <meta name="description" content="EndGam Gaming Magazine Template">
  <meta name="keywords" content="endGam,gGaming, magazine, html">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Favicon -->
  <link href="img/favicon.ico" rel="shortcut icon" />

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i,900,900i" rel="stylesheet">


  <!-- Stylesheets -->

  <link rel="stylesheet" href="{{ URL::asset('/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('/css/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('/css/magnific-popup.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('/css/animate.css') }}">

  <!-- Main Stylesheets -->
  <link rel="stylesheet" href="{{ URL::asset('/css/style.css') }}">


  <!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>