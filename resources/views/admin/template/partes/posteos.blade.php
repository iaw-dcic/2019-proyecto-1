

<table>
  <tr>
 <?php   
  if($articulos){
    foreach($articulos as $art){ 
    
        ?>
          <div class="card-body">
            <h4 class="card-title">Nombre articulo: {{$art->nombre}} </h4>
             
             <?php 
             $id_l= $art->lista_id;
             $lista=DB::table('lista')->where('id','=',$id_l)->orderBy('created_at','desc')->first(); 
             ?>
            <h3 class="card-title">Lista: {{$lista->name}} </h3> 

            <h3 class="card-text">Descripcion del articulo: {{$art->descripcion}}</h3>
            <h2 class="card-title">visibilidad: {{$art->visibilidad}} </h2> 
            <?php 
            
            $id_u=$lista->user_id;
            $user=DB::table('lista')->where('user_id','=',$id_u)->orderBy('created_at','desc')->first();
            $user=DB::table('users')->where('id','=',$id_u)->orderBy('created_at','desc')->first(); 
            ?>
            <h3 class="card-title">Posteado por el usuario: {{$user->name}} </h3> 
          </div>


  <?php
      
     } 
  }else {  //si no hay articulos 

  ?>
          <h3 class="card-text">No se encontraron resultados.</h3>

  <?php } ?>  


  </tr>    
</table>






