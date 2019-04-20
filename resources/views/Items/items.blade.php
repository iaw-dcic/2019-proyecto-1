<!DOCTYPE html>
<html>
	<head>
		<link rel="shortcut icon" href="/images/logo 16.ico">
		<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="/css/home-bootstrap.css">
	</head>

	<body>
		<ul>
			<li><a class="active" href="/public">Inicio</a></li>
			<li><a href="/signup">Registrarse</a></li>
			<li style="float:right"><a href="/">Salir</a></li>
		</ul>

		<div style="padding:20px;margin-top:30px;height:1500px;">
			<h1>Items</h1>

            @foreach ($items as $item) 
			<li>
                {{$item->autor}}
           </li>
            @end
		</div>
	</body>
</html>