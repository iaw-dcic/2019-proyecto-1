@extends('secondTemplate')

@section('content')
	<ul class="mt-2">
		<li>No pueden haber listas con nombres repetidos para un mismo usuario</li>
		<li>Desde la barra de busqueda se pueden buscar usuarios por nombre. Accediendo a su perfil se podrán ver sus listas compartidas</li>
		<li>El nombre del usuario es único</li>
		<li>Para añadir elementos a una lista se debe seleccionar a la misma desde la solapa 'My lists', luego apretando el link 'add song'</li>
		<li>Para publicar una lista se debe seleccionar a la misma y luego ur a la sección 'edit'</li>

		<div class="container my-5">
		  <h2>Resultados de la auditoría</h2>         
		  <table class="table">
		    <thead>
		      <tr>
		        <th>Página</th>
		        <th>Performance</th>
		        <th>Accesibility</th>
		      </tr>
		    </thead>
		    <tbody>
		      <tr>
		        <td>welcome page</td>
		        <td>93</td>
		        <td>30</td>
		      </tr>
		      <tr>
		        <td>home page</td>
		        <td>97</td>
		        <td>67</td>
		      </tr>
		      <tr>
		        <td>my lists page</td>
		        <td>95</td>
		        <td>56</td>
		      </tr>
		    </tbody>
		  </table>
		</div>

		<p class="h6 font-weight-light mt-1 my-3">Autor: Juan Martín Girón - 114157</p>
	</ul>
@endsection