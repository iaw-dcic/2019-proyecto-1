@extends('index.layout')


@section('content')
<form>
 <a href="/show/{{$user-> usuario}}/showUser" class="btn btn-light" > 
  <h1> <p class="font-weight-bolder"> {{$user-> usuario}}  </p></h1> 
<a>
</form>
<form>
@if($misListas->count())
  <div class ="container">
      <ul class="list-group">
      @foreach($misListas as $thing)
        <a href="/show/{{$user-> usuario}}/{{$thing -> id}}"  >
             <h4>{{$thing -> title}} </h4>
           </a> 
       @endforeach
    </ul>     
  </div>
    @endif
    </form>
@endsection

