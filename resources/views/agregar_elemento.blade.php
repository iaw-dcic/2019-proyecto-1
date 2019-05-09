@extends('layouts.app')


@section('content')
<!-- <form name="modifyProfile" id="profileForm" novalidate> -->
<div class="container">
        <form enctype= "multipart/form-data" action="" method="POST">    
                <!-- Inicio del div central parte de formulario información básica -->
                <div class="col-md-12" style="border-width: 1px 1px 0px 1px; border-style: solid; border-color: lightgrey; background: #f1f3f6;">
                    <div class="col-md-8 col-md-offset-2">
                        
                            <div class="control-group form-group">
                                <div class="controls">
                                    <br >
                                    <label>Información del articulo</label>
                                    <br>
                                    Nombre del elemento:
                                    <span id="alertName" data-toggle="popover" data-trigger="hover" data-placement="right" title="" data-content="">
                                        <input type="text" class="form-control"  name ="nombre" id="txtName" placeholder="Introduzca su nombre" required data-validation-required-message="Por favor introduzca su nomnbre.">
                                    </span>
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <br >
                                    <span id="alertlista" data-toggle="popover" data-trigger="hover" data-placement="right" title="" data-content="">
                                        Nombre de la lista:
                                       <input class="form-control" type="text" placeholder="{{$lista->name}}" readonly>
                                       Identificador de la lista:
                                       <input class="form-control" name="id_lista" type="text" value="{{$lista->id}}" readonly>
                                    </span>
                                    <br>
                                    Puntaje
                                    <select name="puntaje">
                                      <option name="1" value="1">1</option> 
                                      <option name="2" value="2" selected>2</option>
                                      <option name="3" value="3">3</option>
                                      <option name="4" value="4">4</option>
                                      <option name="5" value="5">5</option>      
                                    </select>



                                </div>
                            </div>

                           <!--@include('admin.template.partes.cargarArchivo')-->


                            <div class="control-group form-group">
                                <div class="controls">
                                    <label>Descripcion del articulo:</label>
                                    <span id="alertDescription" data-toggle="popover" data-trigger="hover" data-placement="auto" title="" data-content="">
                                        <textarea rows="6" cols="30" class="form-control" name="descripcion" id="txtDescription" required maxlength="999" style="resize:none" 
                                        data-validation-required-message="Por favor introduzca su descripcion."></textarea>
                                    </span>
                                	<br>
                                     <!-- Botones formulario -->
                                    <div class="col-md-12 container allFormButtons">                 
                                        <div class="col-md-5 col-md-offset-3">
                                            <div class="form-group">
                                                    <button type="submit" id="btnEnviar" class="btn btn-primary">Postear</button>
                                            </div>
                                        </div>
                                            &nbsp;
                                    </div>
                                    <!-- Fin botones formulario --> 
                                </div>
                            </div>
                    </div>
                </div>
                <!-- Fin del div central parte de formulario información básica -->
                 
                
        </form>
</div>        
                <!-- Fin del form -->
@endSection()