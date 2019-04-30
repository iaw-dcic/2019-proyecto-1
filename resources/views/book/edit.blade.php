@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
            @endif

            <div class="card">
                <div class="card-header">{{ __('Editar Libro') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('book.update', ['book' => $book->id]) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $book->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                       </div> 

                       <div class="form-group row">
                            <label for="author" class="col-md-4 col-form-label text-md-right">{{ __('Autor') }}</label>

                            <div class="col-md-6">
                                <input id="author" type="text" class="form-control{{ $errors->has('author') ? ' is-invalid' : '' }}" name="author" value="{{ $book->author }}" required autofocus>

                                @if ($errors->has('author'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('author') }}</strong>
                                    </span>
                                @endif
                            </div>
                       </div>

                       <div class="form-group row">
                            <label for="isbn" class="col-md-4 col-form-label text-md-right">{{ __('ISBN') }}</label>

                            <div class="col-md-6">
                                <input id="isbn" type="text" class="form-control{{ $errors->has('isbn') ? ' is-invalid' : '' }}" name="isbn" value="{{ $book->isbn }}" required autofocus>

                                @if ($errors->has('isbn'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('isbn') }}</strong>
                                    </span>
                                @endif
                            </div>
                       </div>

                       <div class="form-group row">
                            <label for="page_number" class="col-md-4 col-form-label text-md-right">{{ __('Número de Página') }}</label>

                            <div class="col-md-6">
                                <input id="page_number" type="text" class="form-control{{ $errors->has('page_number') ? ' is-invalid' : '' }}" name="page_number" value="{{ $book->page_number }}" required autofocus>

                                @if ($errors->has('page_number'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('page_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                       </div>

                       <div class="form-group row">
                            <label for="language" class="col-md-4 col-form-label text-md-right">{{ __('Idioma') }}</label>

                            <div class="col-md-6">
                                <input id="language" type="text" class="form-control{{ $errors->has('language') ? ' is-invalid' : '' }}" name="language" value="{{ $book->language }}" required autofocus>

                                @if ($errors->has('language'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('language') }}</strong>
                                    </span>
                                @endif
                            </div>
                       </div>

                       <div class="form-group row">
                            <label for="year" class="col-md-4 col-form-label text-md-right">{{ __('Año') }}</label>

                            <div class="col-md-6">
                                <input id="year" type="text" class="form-control{{ $errors->has('year') ? ' is-invalid' : '' }}" name="year" value="{{ $book->year }}" required autofocus>

                                @if ($errors->has('year'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('year') }}</strong>
                                    </span>
                                @endif
                            </div>
                       </div>

                       <div class="form-group row">
                            <label for="editor" class="col-md-4 col-form-label text-md-right">{{ __('Editorial') }}</label>

                            <div class="col-md-6">
                                <input id="editor" type="text" class="form-control{{ $errors->has('editor') ? ' is-invalid' : '' }}" name="isbeditorn" value="{{ $book->editor }}" required autofocus>

                                @if ($errors->has('editor'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('editor') }}</strong>
                                    </span>
                                @endif
                            </div>
                       </div>

                       <div class="form-group row">
                            <label for="list_id" class="col-md-4 col-form-label text-md-right">{{ __('Lista') }}</label>
                            <div class="col-md-6">
                                <select id="list_id" class="form-control{{ $errors->has('list_id') ? ' is-invalid' : '' }}" name="list_id" required>
                                    @foreach($lists as $key => $list)
                                        <option {{ ($list->id == $book->list_id ? 'selected' : '') }} value="{{ $list->id }}">{{ $list->name }}</option>
                                    @endforeach

                                </select>

                                @if ($errors->has('list_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('list_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> 



                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Guardar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
