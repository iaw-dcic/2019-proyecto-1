@extends('layouts.app')

@section('content')
<div class="container">
<div class="jumbotron jumbotron-fluid">
  <div class="container">
      @if ($errors->any())
        {{ implode('', $errors->all(':message')) }}
@endif
  <form method="POST" action="{{ route('update', $album->id) }}">
  {{ csrf_field()}}
  <input type="hidden" value="{{$album->id}}" name="id">

    
  <div class="container">
  <div class="form-group row">
            <label for="album" class="col-sm-3 col-form-label">Album</label>
            <div class="col-sm-9">
                <input value={{$album->name}} name="name" type="text" class="form-control" id="albumid" placeholder="Nombre del album" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="band" class="col-sm-3 col-form-label">Artista</label>
            <div class="col-sm-9">
                <input value={{$album->bandName}} name="band" type="text" class="form-control" id="albumid" placeholder="Nombre de banda o artista" required>
            </div>
        </div>
       
    
        <div class="form-group row">
            <label for="publisherid" class="col-sm-3 col-form-label">Cancion</label>
            <div class="col-sm-9">
                <input value={{$album->link}} name="youtubeLink" type="text" class="form-control" id="publisherid"
                       placeholder="https://www.youtube.com/watch?v=sXvzp3YKJ1Q">
            </div>

        </div>

        <div class="form-group row">
            <label for="sel1" class="col-sm-3 col-form-label">Visibilidad : </label>
            <div class="col-sm-9">
            <select value={{$album->public}} name="visibility" class="form-control " id="sel1">
                <option value="1">Publica</option>
                <option value="0">Privada</option>               
            </select>
            </div>
        </div>
   
        <div class="form-group row">
    <label for="exampleFormControlTextarea1" class="col-sm-3 col-form-label">Valoracion Personal</label>
    <div class="col-sm-9">
    <textarea  name="coment" class="form-control" id="exampleFormControlTextarea1" >{{$album->description}}</textarea>
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