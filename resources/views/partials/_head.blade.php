<head>
  <title>{{config('app.name')}} @yield('title')</title>
  <meta charset="UTF-8">
  <meta name="description" content="GG Games, IAW 2019">
  <meta name="keywords" content="laravel,gg-gaming,website, html">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Favicon -->
  <link href="img/favicon.ico" rel="shortcut icon" />

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i,900,900i" rel="stylesheet">


  <!-- Stylesheets -->

  <link rel="stylesheet" href="{{ URL::asset('//css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('/css/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('/css/magnific-popup.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('/css/animate.css') }}">


  <!-- Form -->
  <!--===============================================================================================-->
   
  	<!-- css files -->
  <link rel="stylesheet" href="{{ URL::asset('css/style-form-game.css') }}">

	<!-- Style-CSS -->
  <link rel="stylesheet" href="{{ URL::asset('css/fontawesome-all.css') }}">
  
	<!-- Font-Awesome-Icons-CSS -->
	<!-- //css files -->
	<!-- web-fonts -->
	<link href="//fonts.googleapis.com/css?family=Marck+Script&amp;subset=cyrillic,latin-ext" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=cyrillic,latin-ext"
      rel="stylesheet">
      

  <!-- Main Stylesheets -->
  <link rel="stylesheet" href="{{ URL::asset('/css/style.css') }}">

  <!-- Search table -->
  <link rel="stylesheet" href="{{ URL::asset('/css/search-table-util.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('vendor/perfect-scrollbar/perfect-scrollbar.css')}}">
  <link rel="stylesheet" href="{{ URL::asset('vendor/select2/select2.css') }}">
  @yield('search-specific-style')

  <!--Multiple select forms Bootstrap-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 

 <!-- <link rel="stylesheet" href="{{ URL::asset('css/faq-custom.css') }}"> -->



</head>

