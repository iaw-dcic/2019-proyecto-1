@extends('layouts.app')
 
@section('barra_principal')
                             <div class="col-sm">    
                                 <button class="btn btn-outline-success my-2 my-sm-0"  onclick="location.href='/mis_listas/crear_lista'" type="submit">Crear lista</button>
                            </div>



@endSection()



 @section('content') 
  
 	@include('admin.template.partes.navegacion')
    

    


 <?php   


  if(!is_null($listas)){
    foreach($listas as $lis){ 

    
       ?>
         	<br>
          <div class="media">  					
     			 	<div class="media-body">
       					 <h5 class="mt-0">Nombre de la lista: {{$lis->name}}</h5>
       			<?php  		  $id_u=$lis->user_id;
                				  $user=DB::table('lista')->where('user_id','=',$id_u)->orderBy('created_at','desc')->first();
                				  $user=DB::table('users')->where('id','=',$id_u)->orderBy('created_at','desc')->first(); 
                ?> 
       					 <h5 class="mt-0">Posteado por el usuario: {{$user->name}} </h5>
       					 Descripcion: {{$lis->descripcion}}			    
    			  	</div>


              <button class="btn btn-outline-success my-2 my-sm-0" value="" onclick="location.href='/mis_listas/ver_elementos/?id_lista={{$lis->id}}'" type="submit">Ver elementos</button>

              <button class="btn btn-outline-success my-2 my-sm-0" value="" onclick="location.href='/mis_listas/agregar_elemento/?id_lista={{$lis->id}}'" type="submit">Agregar elemento</button>

              <button class="btn btn-outline-success my-2 my-sm-0" value="" onclick="location.href='/mis_listas/modificar_lista/?id_lista={{$lis->id}}'" type="submit">Modificar lista </button>

              <button class="btn btn-danger"                       
                      onclick="myFunction()"
                       >Eliminar lista </button>

              <script>
                function myFunction() {
                  if(confirm("Estas seguro ? "))
                      location.href='/mis_listas/eliminar_lista/?id_lista={{$lis->id}}'
                }
              </script>


			     </div>

  <?php
        
     } 
  }else {  //si no hay articulos 

  ?>
          <h3 class="mt-0">No se encontraron resultados.</h3>

  <?php } ?>  


  </tr>    
</table>







  @endSection()



