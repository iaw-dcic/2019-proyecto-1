@extends('index.layout')


@section('content')
<div class = "container">
		<table class="table">	
			<thead class="thead-dark">
				<tr>
				<th scope="col">Página</th>
				<th scope="col">Performance</th>
				<th scope="col">Accessibility</th>
				</tr>
			</thead>
			
			<tbody>
			
			<tr>
				<td>/home</td>
				<td>98</td>
				<td>80</td>
			</tr>
            <tr>
				<td>/things</td>
				<td>99</td>
				<td>85</td>
			</tr>
            <tr>
				<td>/show/user/list</td>
				<td>98</td>
				<td>80</td>
			</tr>
		
		@endif
			</tbody>
		</table>
	</div>

<li>
<p class="font-weight-light">Layout Bootstrap 4.3.</p> 
<p class="font-weight-light">Los usuarios no se pueden eliminar.</p> 
</li>
<p class="font-weight-light">Desarollado por Gino Liberati</p>

@endsection