@extends('layouts.app')
 
 @section('content')
 	
 <?php   
  if(!is_null($articulos)){
    foreach($articulos as $art){ 
 ?>
 			
 		
          <div class="card-body">
            <h4 class="card-title">Nombre articulo: {{$art->nombre}} </h4>
            <?php 
             $id_l= $art->lista_id;
             $lista=DB::table('lista')->where('id','=',$id_l)->orderBy('created_at','desc')->first(); 
             ?>
            <h3 class="card-title">Lista: {{$lista->name}} </h3> 
            <h3 class="card-title">Puntaje: {{$art->puntaje}} </h3> 
            <h3 class="card-text">Descripcion del articulo: {{$art->descripcion}}</h3>
            
            <?php 
            
            $id_u=$lista->user_id;
            $user=DB::table('lista')->where('user_id','=',$id_u)->orderBy('created_at','desc')->first();
            $user=DB::table('users')->where('id','=',$id_u)->orderBy('created_at','desc')->first(); 
            ?>
            
           
         </div>
        
  
  <?php
        
     } 
  }else {  //si no hay articulos 

  ?>	
          <div class="card-text">No existen articulos en esta lista.</div>

  <?php } ?>  




    

  @endSection()
