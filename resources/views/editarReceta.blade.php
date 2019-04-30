@extends('layout')
@section('content')
<br><br>
<div class="container-fluid">
   <!-- datos receta -->
<div class="row">
<div class="col-lg-4 col-sm-12 col-xs-12">
<form   role="form" enctype="multipart/form-data" method="post"  action="{{route('actualizar',['nombre' => $receta->nombre ])}}">
                {{ csrf_field() }}
                     <div class="form-group">
                        <label  id="selectLista" for="inputName" >Lista</label>
                        <select  name="lista" class="form-control">
                        <option  value="{{$receta->listaId->id}}" selected="true" > {{$receta->listaId->nombre}} </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputName">Nombre</label>
                        <input name="nombre" type="text"  class="form-control" placeholder="Nombre de la receta" value="{{$receta->nombre}}" />
                    </div>
                    <div class="form-group">
                        <label for="inputMessage">Categoria:</label>
                        <select name="categoria" class="form-control" >
                            @if($receta->categoria == 1)
                            <option selected="true"  value="1">Dulce </option>
                             <option value="0">Salado </option>
                             @endif
                             @if($receta->categoria == 0)
                             <option selected="true"  value="0">Salado </option>
                             <option value="1">Dulce </option>
                             @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputMessage">Decripción:</label>
                        <textarea name="descr" class="form-control"  placeholder="Descripcion de la receta" >{{$receta->descripcion}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="inputMessage">Pasos:</label>
                        <textarea name="pasos" class="form-control"   placeholder="Pasos de la receta"  >{{$receta->pasos}}</textarea>
                    </div>
                    <div class="form-group">
                             <label for="inputMessage">Imagen:</label>
                             <input type="file" name="filename" class="form-control">
                              </div>

                   <hr>
                    
</div>
 <!-- ingredientes --> 
    <div class="col-lg-8 col-sm-12 col-xs-12″" >
     <h3> Ingredientes </h3>
        @for ($i =0; $i < 10 ; $i++) 
         @if($i < $ingreceta->count())
      
         <input type="text" value="{{$ingreceta[$i]->id}}" name="id" style="visibility:hidden"> 
                   
         @endif
                        
        <div class="row">
                    <div class="col-lg-4 col-sm-4 col-xs-4">
                    <div class="form-group">
                        <label for="inputMessage">Ingrediente:</label>
                        <select   name={{"ingrediente".$i}} class="form-control" >
                           @foreach($ingredientes as $ingrediente)
                                @if($i < $ingreceta->count() && $ingrediente->id == $ingreceta[$i]-> ingredienteId->id)
                                 <option selected="true" value="{{$ingrediente->id}}">{{$ingrediente->nombre}} </option>
                                @else
                                <option  value="{{$ingrediente->id}}">{{$ingrediente->nombre}} </option>
                                @endif
                                 @endforeach
                        </select>
                    </div>
                    
                    </div>
                    <div class="col-lg-3 col-sm-3 col-xs-3">
                    <div class="form-group">
                        <label for="inputMessage">Medida:</label>
                        <select   name={{"medida".$i}} class="form-control" >
                        @foreach($medidas as $medida)
                             @if($i < $ingreceta->count() && $medida->id == $ingreceta[$i]-> medidaId->id)
                                 <option selected="true" value="{{$medida->id}}">{{$medida->nombre}} </option>
                             @else
                                <option  value="{{$medida->id}}">{{$medida->nombre}} </option>
                             @endif
                             @endforeach
                        </select>
                        
                             
                    </div>
                    </div>
                    <div class="col-lg-3 col-sm-3 col-xs-3">
                    <div class="form-group">
                        <label for="inputMessage">Cantidad:</label>
                        @if($i < $ingreceta->count())
                        <input name="{{"cantidad".$i}}" type="number" class="form-control" 
                          value= "{{$ingreceta[$i]->cantidad}}" placeholder="Cantidad"/>
                        @else
                        <input name="{{"cantidad".$i}}" type="number" class="form-control"  placeholder="Cantidad"/>
                        @endif
                    </div>
                    </div>
                    <div class="col-lg-2 col-sm-2 col-xs-2 text-center" id="botonEliminar">
                      
                    @if($i < $ingreceta->count())
                    <a aria-label="borrar{{$ingreceta[$i]->ingredienteId->nombre}}"   href="{{route('borrarIng',['id'=>$ingreceta[$i]->id])}}"
                             onclick="return confirm('¿Seguro que deseas eliminar {{$ingreceta[$i]->ingredienteId->nombre}}?')">
                              Eliminar
                                    
                         </a>
                     
                     @endif
                    </div>
                   <hr>
                   </div>
                  
                   @endfor
   
</div>
<button type="submit" class="float-right btn " data-backdrop="static"  >  Guardar </button>
</form>
</div>
</div>


@stop