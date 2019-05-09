@extends('layouts.app')



@section('librerias')

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Perfil {{$usuario->name}}  </title>

    <!--  CSS de Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Librería jQuery requerida por los plugins de JavaScript -->
    <script src="http://code.jquery.com/jquery.js"></script>

    <!-- Librería jQuery personalizada-->
    <script src="js/jquery-example.js"></script>
    
    <!-- Todos los plugins JavaScript de Bootstrap (también puedes incluir archivos JavaScript individuales de los únicos plugins que utilices) -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Referencia a otro archivo css propio, donde se realizan las modificaciones css de los componentes y elementos -->
 <!--   <link href="css/personalizado.css" rel="stylesheet"> -->
    <!-- Referencia a otro archivo css propio, donde se realizan las modificaciones css de la página principal -->
    <!--<link href="css/starter-template.css" rel="stylesheet">-->
  
@endSection()

@section('content')

  
            
                <div class="container">
                    <label>Foto de perfil</label> 
                    <br>
                    <img src="/uploads/avatars/{{$usuario->avatar}}" style="width:250px; height: 250px;float: left;border-radius: 50%; margin-right: 20px ">
                     <div class="card-body">
                        <h4 class="card-title">Nombre: {{$usuario->name}} </h4>                       
                        <br>
                        <h4 class="card-title">Edad: {{$usuario->edad}} </h4>                        
                        <br>
                        <h3 class="card-title">Email: {{$usuario->email}} </h3> 
                        
                    </div>
                </div>

@endSection()