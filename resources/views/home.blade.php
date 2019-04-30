@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Best Goals!</div>

                <div class="card-body">
                    

                    @foreach ($paquetes as $paquete)
                    <!-- Cada paquete es un [user,listas]-->

                    <div class="card-header" style="padding: 3px; background-color: rgba(92, 112, 57, 0.912)">
                        <a href="otherProfile/{{$paquete[0]->id}}" style="color: white"> {{ $paquete[0]->name}} </a> 
                    </div>
                    @if ($paquete[1]->first() == null)
                    <p></p>
                    &nbsp&nbsp&nbsp&nbsp<i> No posee listas públicas.</i>
                    <p></p>
                    @else
                    <div class="card-body">
                        @foreach ($paquete[1] as $lista)
                        <p><a href="otherList/{{$lista->id}}"> {{ $lista->name }} </a></p>
                        @endforeach
                    </div>
                    @endif
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection