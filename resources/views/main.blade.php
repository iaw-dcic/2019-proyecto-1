
@extends('layouts.app')
 
 @section('content') 
  
 	@include('admin.template.partes.navegacion')
    

    


 <?php   
  if(!is_null($listas)){     ?>
       
        <div class="container">
                    <div class="row">
                      <div class="col">
                        <h3 class="mt-0">Nombre </h3>
                      </div>
                      <div class="col">
                        <h3 class="mt-0">Propietario </h3>
                      </div>
                      <div class="col">
                          <h3 class="mt-0">Descripcion </h3>
                      </div>
                      <div class="col">
                        
                      </div>
                    </div>
                  </div> 
                  <br>
       
 <?php
    foreach($listas as $lis){ 
    
       if(!strcmp($lis->visibilidad,'publica'))
        { ?>
        <div class="container">  
          
           	<div class="media">  					
   			 	    <div class="media-body">
                 
     					<!-- <h3 class="mt-0">Nombre: {{$lis->name}}</h3> -->

     			   <?php  		  $id_u=$lis->user_id;
              				    $user=DB::table('lista')->where('user_id','=',$id_u)->orderBy('created_at','desc')->first();
              				    $user=DB::table('users')->where('id','=',$id_u)->orderBy('created_at','desc')->first(); 
              ?> 
                
     					<!--   <h3 class="mt-0"> usuario: {{$user->name}} </h3>   -->  					  
                  
              <!--        Descripcion: {{$lis->descripcion}}		         -->
                
                              
             <!--   <button class="btn btn-outline-success my-2 my-sm-0" value="" onclick="location.href='/mis_post/modificar/?id_post={{$lis->id}}'" type="submit">Ver elementos</button>	

-->


                  <div class="container">
                    <div class="row">
                      <div class="col">
                        <h3 class="mt-0">{{$lis->name}}</h3>
                      </div>
                      <div class="col">
                        <h3 class="mt-0">{{$user->name}} </h3>
                      </div>
                      <div class="col">
                          <h3 class="mt-0">{{$lis->descripcion}} </h3>
                      </div>
                      <div class="col">
                        <button class="btn btn-outline-success my-2 my-sm-0" value="" onclick="location.href='/ver_lista/?id_lista={{$lis->id}}'" type="submit">Ver elementos</button>
                        <button class="btn btn-outline-success my-2 my-sm-0" value="" onclick="location.href='/ver_perfil/?usuario={{$lis->user_id}}'" type="submit">Ver propietario</button>
                      </div>
                    </div>
                  </div>

                  <br>



  			  	    
              
              </div>
  			    </div>
          
        </div>  
  <?php
        }
     } 
     
  
     
  }else {  

  ?>       
           
           <br>
           <h3 class="mt-0">No se encontraron resultados.</h3>
         
  <?php } ?>  

  @endSection()

 

