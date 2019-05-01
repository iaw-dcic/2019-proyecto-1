@extends('layout')

@section('head')
	@parent
	<link href="{{asset('css/tablelists.css')}}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
	<div class="d-flex justify-content-center h-100">
        <div class="card text-center" style="width: 50rem; height:30rem">
            <div class="card-header">
                <h3>Mis listas</h3>
                <h4>Tipo lista 1: pública / 0: privada</h4>
                <table class="table" style="margin-bottom:-14px;">
                <thead>
                        <th>Tipo lista</th>
                        <th>Nombre lista</th>
                        <th>Editar</th>
                        <th>Películas</th>
                        <th>Eliminar</th>  
                </thead>
                </table>
            </div>
            <div class="card-body text-center" style="overflow-y:scroll" >
                <table class="table"style="margin-top:-20px;">
                    <tbody>
                        @foreach($lists as $list)
                            <tr>
                                <td>{{ $list->visible}}</td>
                                <td>{{ $list->name}}</td>
                                <td><button type="button" class="btn btn-info" data-id={{$list->id}} data-name={{$list->name}} data-toggle="modal" data-target="#editList">
                                    <i class="fas fa-edit"></i>
                                    </button>
                                </td>
                                <td><a href="{{ url('/editlist/'.$list->id) }}" class="btn btn-info"> <i class="fas fa-film"></i></a></td>
                                <td><button type="button" class="btn btn-danger" data-id={{$list->id}} data-toggle="modal" data-target="#deleteList">
                                    <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

 <!-- Modal editar lista-->
 <div class="modal fade" id="editList" tabindex="-1" role="dialog" aria-labelledby="editListLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editListLabel">Editar lista</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('edit_list')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="list-name" class="col-form-label">Nombre lista:</label>
                        <input type="text" class="form-control" name="name" id="list-name" value="">
                    </div>
                    <input type="hidden" id="id_list" name="id_list" value ="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal eliminar lista-->
<div class="modal fade" id="deleteList" tabindex="-1" role="dialog" aria-labelledby="deleteListLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteListLabel">Eliminar lista</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('delete_list')}}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}   
                <div class="modal-body">
                    ¿Está seguro que quiere eliminar la lista?
                    <input type="hidden" name="id_list" id="id_list" value="">
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-danger">Aceptar</button>
            </form>
        </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    <script>    
            $('#deleteList').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) 
            var id = button.data('id')
            var modal = $(this)
            modal.find('.modal-body #id_list').val(id)
            })      
    </script>

<script>    
        $('#editList').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) 
        var id = button.data('id')
        var name = button.data('name')
        var visible = button.data('visible')
        var modal = $(this)
        modal.find('.modal-body #id_list').val(id)
        modal.find('.modal-body #list-name').val(name)
        modal.find('.modal-body #list-visible').val(visible)
        })      
    </script>
@endsection