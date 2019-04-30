@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card material-light">
                <div class="card-header material-dark">
                  Read Me
                </div>
                <div class="card-body material-regular">
                    <div class="row">
                      <div class="col">
                        <h3>Recursos Utilizados</h3>
                      </div>

                    </div>
                    <hr>
                    <div class="row">
                      <div class="col">
                        <a href="https://scotch.io/tutorials/simple-laravel-layouts-using-blade">Layout</a>
                      </div>
                      <div class="col">
                        <a href="https://material.io/tools/color/#!/?view.left=0&view.right=0&primary.color=263238&primary.text.color=ffffff">Paleta de Colores</a>
                      </div>
                      <div class="col">
                        <a href="https://www.tutsmake.com/laravel-5-facebook-login-with-socialite/">Login con Social Media 1</a>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        <a href="https://medium.com/@Alabuja/social-login-in-laravel-with-socialite-90dbf14ee0ab">Login con Social Media 2</a>
                      </div>
                      <div class="col">
                        <a href="https://jquery.com/">JQuery</a>
                      </div>
                      <div class="col">
                        <a href="https://getbootstrap.com/">Bootstrap</a>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        <a href="https://fonts.google.com/specimen/Open+Sans+Condensed">Tipografía</a>
                      </div>
                      <div class="col">
                        <a href="https://itsolutionstuff.com/post/laravel-57-crud-create-read-update-delete-tutorial-example-example.html">ABM en Laravel</a>
                      </div>
                      <div class="col">
                        <a href="https://eloquentbyexample.com/">Tutorial Eloquent</a>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        <a href="https://stackoverflow.com/questions/34099777/laravel-5-1-validation-rule-alpha-cannot-take-whitespace">Validacion letras y espacios</a>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col">
                        <h3>Problemas no resueltos</h3>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        No pude hacer andar la creacion de una pelicula luego de intentar de varias maneras el framework siempre genera una excepcion "Method is not suported for this route".

                        <ul>
                          <li>Defini Route::resource al controlador de pelicula action "route('pelicula.create')" con @ method('GET') y "route('pelicula.store')" con @ method('POST')</li>
                          <li>Defini una ruta Route::post al metodo de crear_pelicula del controlador con url('/crear_pelicula') y con @ method(post)</li>
                          <li>use action('PeliculaController@crear_pelicula')</li>
                        </ul>

                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
