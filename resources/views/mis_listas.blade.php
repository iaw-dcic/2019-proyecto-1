@extends('layouts.app')
 
@section('barra_principal')
                             <div class="col-sm">    
                                 <button class="btn btn-outline-success my-2 my-sm-0"  onclick="location.href='/mis_listas'" type="submit">Mis Listas</button>
                            </div>


@endSection()



 @section('content') 
  
 	@include('admin.template.partes.navegacion')
    

    


 <?php   


  if($listas){
    foreach($listas as $lis){ 
    
       if(strcmp($lis->visibilidad,'publica')==0){ ?>
         	<div class="media">  					
 			 	<div class="media-body">
   					 <h5 class="mt-0">Nombre de la lista: {{$lis->nombre}}</h5>
   			<<?php  		  $id_u=$lista->user_id;
            				  $user=DB::table('lista')->where('user_id','=',$id_u)->orderBy('created_at','desc')->first();
            				  $user=DB::table('users')->where('id','=',$id_u)->orderBy('created_at','desc')->first(); 
            ?> 
   					 <h4 class="mt-0">Posteado por el usuario: {{$user->name}} </h4>
   					 Descripcion: {{$lis->descripcion}}			    
			  	</div>
			</div>

  <?php
        }
     } 
  }else {  //si no hay articulos 

  ?>
          <h3 class="mt-0">No se encontraron resultados.</h3>

  <?php } ?>  


  </tr>    
</table>







  @endSection()

 