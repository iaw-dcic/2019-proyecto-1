@extends('layouts.app')

@section('content')
        <div class="container">
            <h1 class="text-center pb-4">Ultimas listas publicadas</h1>
                {{-- <div class="card-deck mx-auto"> --}}
            <div class="row">
            @foreach ($lists as $list)
                <div class="col-lg-4 col-sm-6 col-12 pb-4">
                    <div class="card border-dark text-left h-100">
                    {{-- <div class="card border-dark mb-3 text-left" style="max-width: 100%; min-width: 15rem;"> --}}
                        <div  class="card-body text-dark d-flex flex-column pointer" onclick="navigateTo('{{ route('ver-lista', $list->id) }}')">
                            <h4 class="card-title">{{ $list->name }}</h4>
                            <div class="mt-auto mr-auto font-italic ">
                                by <a href="{{ route('ver-perfil', $list->user_id) }}">{{ $list->user_name }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
         </div>
@endsection

