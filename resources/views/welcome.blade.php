@extends('layouts.app')

@section('content')
    <div class="container" style="max-width: 850px">
        <h1 class="text-center pb-4">Ultimas listas publicadas</h1>
        <div class="card-deck">
        @foreach ($lists as $list)
            {{-- <h4>{{ $list['name'] }}</h4> --}}
                <div class="card border-dark mb-3 text-center" style="max-width: 15rem;">
                    <div class="card-body text-dark d-flex flex-column pointer">
                        <h5 class="card-title">Todas las novelas de Sherlock Holmesasdadaasdadsad</h5>
                        {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
                        {{-- <a href="#" class="btn btn-primary">Ver</a> --}}
                        <a href="#" class="mt-auto ml-auto">by gabi</a>
                    </div>
                </div>
                @endforeach
            </div>
    </div>
@endsection

{{-- <div class="card bg-light mb-3" style="max-width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Light card title</h5>
        </div>
    </div> --}}
