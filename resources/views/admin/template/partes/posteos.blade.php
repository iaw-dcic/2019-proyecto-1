

<table>
  <tr>
 <?php   
  if($articulos){
    foreach($articulos as $art){ ?>
    
       <!-- <div class="card" style="width: 18rem;">
          <img src="..." class="card-img-top" alt="...">
       -->   
          <div class="card-body">
            <h4 class="card-title">Nombre articulo: {{$art->nombre}} </h3>
             
             <?php 
             $id_c= $art->categoria_id;
             $categoria=DB::table('categorias')->where('id','=',$id_c)->orderBy('created_at','desc')->first(); 
             ?>
            <h5 class="card-title">Categoria: {{$categoria->name}} </h3> 

            <h3 class="card-text">Descripcion del articulo: {{$art->descripcion}}</h3>
            
            <?php 
            $id_u= $art->user_id;
            $user=DB::table('users')->where('id','=',$id_u)->orderBy('created_at','desc')->first(); 
            ?>
            <h3 class="card-title">Posteado por el usuario: {{$user->name}} </h3> 
          </div>
  <?php } }else {  ?>
          <h3 class="card-text">No se encontraron resultados.</h3>

  <?php } ?>  


  </tr>    
</table>






