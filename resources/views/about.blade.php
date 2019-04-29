@extends('secondTemplate')

@section('content')
	<ul>
		<li>No pueden haber listas con nombres repetidos para un mismo usuario</li>
		<li>Desde la barra de busqueda se pueden buscar usuarios por nombre. Accediendo a su perfil se podrán ver sus listas compartidas</li>
		<li>El nombre del usuario es único</li>
		<li>Para añadir elementos a una lista se debe seleccionar a la misma desde la solapa 'My lists', luego apretando el link 'add song'</li>
		<li>Para publicar una lista se debe seleccionar a la misma y luego ur a la sección 'edit'</li>
	</ul>
@endsection