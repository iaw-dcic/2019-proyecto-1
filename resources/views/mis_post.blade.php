@extends('layouts.app')
 
 @section('content') 
  
 	<table>
  <tr>
 <?php   
  if($articulos){
    foreach($articulos as $art){ 
 ?>			
 		 <form>
          <div class="card-body">
            <h4 class="card-title">Nombre articulo: {{$art->nombre}} </h4>
            <?php 
             $id_l= $art->lista_id;
             $lista=DB::table('lista')->where('id','=',$id_l)->orderBy('created_at','desc')->first(); 
             ?>
            <h3 class="card-title">Lista: {{$lista->name}} </h3> 

            <h3 class="card-text">Descripcion del articulo: {{$art->descripcion}}</h3>
            <h2 class="card-title">Visibilidad: {{$art->visibilidad}} </h2> 
            <?php 
            
            $id_u=$lista->user_id;
            $user=DB::table('lista')->where('user_id','=',$id_u)->orderBy('created_at','desc')->first();
            $user=DB::table('users')->where('id','=',$id_u)->orderBy('created_at','desc')->first(); 
            ?>
            
            <div class="btn-group" role="group" aria-label="Basic example">
			 

            	<button class="btn btn-outline-success my-2 my-sm-0" value="" onclick="location.href='/mis_post/eliminar/?id_post={{$art->id}}'" type="submit">Eliminar </button>

            	<button class="btn btn-outline-success my-2 my-sm-0" value="" onclick="location.href='/mis_post/modificar/?id_post={{$art->id}}'" type="submit">Modiicar </button>

			  <button type="button" name="eliminar"  class="btn btn-secondary">Eliminar</button>
				 
			  <button type="button" name="modificar" class="btn btn-secondary">Modificar</button>
			
			</div> 
        	
          </div>
         </form>

  <?php
        
     } 
  }else {  //si no hay articulos 

  ?>
          <h3 class="card-text">No tienes posteos realizados.</h3>

  <?php } ?>  


  </tr>    
</table>

    

  @endSection()

 