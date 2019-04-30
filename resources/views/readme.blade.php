@extends('layouts.app')

@section('stylesheets')
	<link rel="stylesheet" href="{{asset('css/login.css')}}">
	<link rel="stylesheet" href="{{asset('css/readme.css')}}">
@endsection

@section('body')
	<div class="wrapper">
		<div id="formContent">
			<h1>Aplicación list maker</h1>
			<h2>Ingeniería de aplicaciones web 2019</h2>
			<h3>Ana Inés Dennehy</h3>
			<h4>Funcionalidad principal</h4>
			<label>La funcionalidad de la aplicación consiste en realizar distintas to-do lists,
				las cuales pueden tener distinta visibilidad (pública o privada), y tener items,
				los cuales a su vez tienen una prioridad (alta, media o baja).
			</label>
			<h4>Créditos de templates</h4>
			<label>Todas las páginas de la aplicación tienen el esquema general de bootstrap 3.3.7
			</label>
			<label>La mayoría de los paneles se lograron con un template de login el cual ofrecía
				aspecto de borde de sombra de paneles, inputs más bonitos y un fadein general.
				Dicho template se puede encontrar en
				<a href="https://bootsnipp.com/snippets/dldxB">https://bootsnipp.com/snippets/dldxB</a>.
			</label>
			<label>Además, se usó un template para mostrar la imagen de perfiles con un borde que
				muestra el username, y otro más para mostrar un toggle switch.<br>
				<a href="https://bootsnipp.com/snippets/dldxB">https://bootsnipp.com/snippets/dldxB</a>
				<a href=https://www.w3schools.com/howto/howto_css_switch.asp>https://www.w3schools.com/howto/howto_css_switch.asp</a>
			</label>
			<h4>Aclaraciones</h4>
			<label>La descripción de los items de las listas por una cuestión de espacio dentro del post
				se ve a través de un tooltip (aparece el texto cuando se lleva el mouse sobre el item).
			</label>
		</div>
	</div>
@endsection
