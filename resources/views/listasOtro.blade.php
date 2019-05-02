<?php  $count=0 ?>
               
               <!-- Lado derecho, las listas del usuario -->  
                  <div class="col-md-8" style="background:lightblue">
                  @foreach($listas as $lista)
                   @if($lista->privacidad)
                      <div class="list-group">
                        
                           <?php  $count=0 ?>
                           <div class="row">
                          <div class="col-12">
                            
                           <a href="#" class="list-group-item list-group-item-action active"> {{$lista->nombre}}</a>
                          </div>
                           
                              </div>
                              <div class="list-group-item">
                             
                                  @foreach($recetas as $receta)
                                     @if($receta->listaId->nombre == $lista->nombre)
                                  <div class="row">
                                  <div class="col-12">
                                    <a class="nombreReceta" href="{{route('receta',['nombre'=>$receta->nombre])}}">  <h4 class="list-group-item-heading">   
                                         {{$receta->nombre}}</h4>
                                      </a>
                                      <?php $count++ ?>
                                      </div> 
                                   
                                  </div> 
                                  <hr>
                                    @endif
                                 @endforeach
                              
                             
                              </div>
                              <div class="list-group-item justify-content-between">
                              Total: <span class="badge badge-secondary badge-pill">{{$count}}</span>
                            
                             
                              </div>
                          <br> 
                           
                          
                         
                             
                      </div> 
                      <br>
                      @endif
                      @endforeach  
                        @if($count > 0) 
                          <a href="#" class="list-group-item list-group-item-action active justify-content-between">Total <span class="badge badge-light badge-pill">{{$count }}</span></a>
                        @endif
                        @if($count== 0)
                            <p> {{$perfil->nombre}} no tiene listas </p>
                        @endif
                       
                           
                      </div>
                    
                  </div>
              </div>
          </div>
          </div>