@extends('layouts.app')


    <!--Boostrap core CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic-bootstrap.css" integrity="sha256-CNwnGWPO03a1kOlAsGaH5g8P3dFaqFqqGFV/1nkX5OU=" crossorigin="anonymous" />

    <!--dinamica tabla -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>

    <title>Crear Usuario</title>
<body>

        <br>
        <br>
        <br>
        <br>
        <br>
        <br>


        <div class="container">
                <form method="PUT" action="{{ route('users.updateEditItem',$items->first()->list_id) }}">
                        {{  csrf_field() }} <!--Laravel nos protoge para evitar que un sitio malicioso envia solicitudes post a nuestra app pidiendo este token-->

                <section>


                    <div class="panel panel-footer">
                        <table class= "table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nombre del Club</th>
                                    <th>Estadio</th>
                                    <th>Capacidad Estadio</th>
                                    <th>Pais</th>
                                    <th><a href="#" class="addRow"><i class="glyphicon glyphicon-plus"></i></a></th>
                                </tr>
                            </thead>
                            <tbody>
                                    @foreach ($items as $item)


                                    <tr>
                                        <td><input type="text" name="nombre_club[]" class="form-control" required="" value="{{ old('nombre_club',$item->nombre_club) }}"></td>
                                        <td><input type="text" name="nombre_estadio[]" class="form-control" value="{{ old('nombre_estadio',$item->nombre_estadio) }}"></td>
                                        <td><input type="number" name="capacidad_estadio[]" class="form-control quantity" required=""value="{{ old('capacidad_estudio',$item->capacidad_estadio) }}"></td>
                                        <td><input type="text" name="pais[]" class="form-control budget"value="{{ old('pais',$item->pais) }}"></td>
                                        <td><a href="#" class="btn btn-danger remove"><i class="glyphicon glyphicon-remove"></i></a></td>
                                    </tr>
                                    @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td> <input type="submit" name="" value="Guardar cambios" class="btn btn-primary"></td>
                                </tr>
                            </tfoot>
                        </table>


                    </div>
                </section>
            </form>
        </div>
        <script type="text/javascript">
            //Codigo jquery para agregar mas filas
            $('.addRow').on('click',function(){
                addRow();
            });
            function addRow()
            {
                var tr='<tr>'+
                '<td><input type="text" name="nombre_club[]" class="form-control" required=""></td>'+
                '<td><input type="text" name="nombre_estadio[]" class="form-control"></td>'+
                '<td><input type="number" name="capacidad_estadio[]" class="form-control quantity" required=""></td>'+
                '<td><input type="text" name="pais[]" class="form-control budget"></td>'+
                '<td><a href="#" class="btn btn-danger remove"><i class="glyphicon glyphicon-remove"></i></a></td>'+
                '</tr>';
                $('tbody').append(tr);
            };
            //codigo para sacar filas
            $('.remove').live('click',function(){
                var last=$('tbody tr').length;
                if(last==1){
                    alert("you can not remove last row");
                }
                else{
                     $(this).parent().parent().remove();
                }
            });
        </script>






</body>

