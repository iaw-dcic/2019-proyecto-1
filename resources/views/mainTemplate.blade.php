<!DOCTYPE html>
<html>
<head>
	<link href="/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-expand-md navbar-dark bg-dark sticky-top">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item">
				<a class="nav-link" href="/">Home</a>
			</li>

			<li class="nav-item">
				<a class="nav-link" href="/lists">My lists</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="/create">Add list</a>
			</li>
		</ul>
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link" href="/about">About</a>
			</li>
		</ul>
	</nav>

	<div>
		@yield('content')
	</div>
</body>
</html>