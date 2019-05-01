
@extends('layouts.app')

@section('content')
    <div class="container invisible" id="container">

        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        @if (session()->has('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
        @endif

        <h2 class="text-center">Mis Listas</h2>
        <a href="{{ route('crear-lista') }}" class="btn btn-md btn-success mb-3 mb-sm-3">
            <span class="fas fa-plus mr-1"></span>
            Crear nueva lista
        </a>

        <div class="table-responsive" id="table_resp">
            <table class="table w-auto" id="table_id" >
                <thead class="thead-light">
                    <tr>
                        {{-- <th scope="col" >Id</th> --}}
                        <th scope="col" id="col_estado">Estado</th>
                        <th scope="col" id="col_lista">Lista</th>
                        <th scope="col" id="col_acciones">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                @foreach ($lists as $list)
                <tr>
                    {{-- <th scope="row">{{ $list['id'] }}</th> --}}
                    <td>
                        <a href="{{ route('actualizar-estado-lista', $list['id']) }}" class="btn btn-sm btn-{{ $list['status']=='Publica' ? 'success' : 'secondary' }} my-1 my-sm-0">
                            <span class="fas fa-{{ $list['status']=='Publica' ? 'unlock' : 'lock' }} mr-1"></span>
                            <span class="d-none d-lg-inline">{{ $list['status'] }}</span>
                        </a>
                    </td>

                    <td>
                    <a href="{{ route('editar-lista', $list['id']) }}" >
                            {{ $list['name'] }}
                        </a>
                    </td>

                    <td>
                        <a href="{{ route('show-lista', $list['id']) }}" class="btn btn-sm btn-primary my-1 my-sm-0">
                            <span class="fas fa-edit mr-1"></span>
                            <span class="d-none d-lg-inline">Editar</span>
                        </a>
                        <!-- Button trigger modal -->
                        <button onclick="setId({{$list['id']}});" type="button" data-toggle="modal" data-target="#confirmModal" class="btn btn-sm btn-danger my-1 my-sm-0">
                            <span class="fas fa-trash mr-1"></span>
                            <span class="d-none d-lg-inline">Eliminar</span>
                        </button>
                    </td>
                </tr>
                @endforeach

                </tbody>
            </table>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">¿Estas seguro?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    Por favor confirme que quiere eliminar.
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <form action="/usuario/eliminar-lista" method="POST" id="eliminarForm">
                    @csrf
                    <button type="submit" class="btn btn-primary">Confirmar</button>
                </form>
                </div>
            </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script type="text/javascript">
        window.onload = ajustarAncho;
    </script>
@endsection
