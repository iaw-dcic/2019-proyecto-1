@extends('layouts.app')

@section('content')
<div class="container">
<div class="jumbotron jumbotron-fluid">
  <div class="container">
  <form method="POST" action="/createAlbum">
  {{ csrf_field()}}
  <div class="container">
  <div class="form-group row">
            <label for="album" class="col-sm-3 col-form-label">Album</label>
            <div class="col-sm-9">
                <input name="name" type="text" class="form-control" id="albumid" placeholder="Nombre del album">
            </div>
        </div>

        <div class="form-group row">
            <label for="band" class="col-sm-3 col-form-label">Artista</label>
            <div class="col-sm-9">
                <input name="band" type="text" class="form-control" id="albumid" placeholder="Nombre de banda o artista">
            </div>
        </div>
       
    
        <div class="form-group row">
            <label for="publisherid" class="col-sm-3 col-form-label">Cancion</label>
            <div class="col-sm-9">
                <input name="youtubeLink" type="text" class="form-control" id="publisherid"
                       placeholder="https://www.youtube.com/watch?v=sXvzp3YKJ1Q">
            </div>

        </div>

        <div class="form-group row">
            <label for="sel1" class="col-sm-3 col-form-label">Visibilidad : </label>
            <div class="col-sm-9">
            <select name="visibility" class="form-control " id="sel1">
                <option value="1">Publica</option>
                <option value="0">Privada</option>               
            </select>
            </div>
        </div>
   
        <div class="form-group row">
    <label for="exampleFormControlTextarea1" class="col-sm-3 col-form-label">Valoracion Personal</label>
    <div class="col-sm-9">
    <textarea name="coment" class="form-control" id="exampleFormControlTextarea1" ></textarea>
    </div>
    </div>
  


        <div class="form-group row">
            <div class="offset-sm-3 col-sm-9">
            <button type="submit" class="btn btn-primary">Agregar Album</button>

            </div>
        </div>
 
</form>
</div>
  </div>
</div>
</div>

@endsection