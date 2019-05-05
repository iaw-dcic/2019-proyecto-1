@extends('layouts.app')

@section('scripts')
    <script>
        function changeTitle($i){
            document.getElementById('dropdown').text($i);
        }
    </script>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Item') }}</div>
    
                    <div class="card-body">
                        <form method="POST" action="{{ route('items.store') }}">
                            @csrf
    
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
    
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
    
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
    
                            <div class="form-group row">
                                    <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="description" type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ old('description') }}" required>
        
                                        @if ($errors->has('description'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
    
                            <div class="form-group row">
                                    <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>
        
                                    <div class="col-md-6">
                                        <div class="input-group-append">
                                            <span class="input-group-text">$</span>
                                            <input id="price" type="text" maxlength="10" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" required>
                                        </div>
                                        @if ($errors->has('price'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('price') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                            <div class="form-group row">
                                    <label for="collection_id" class="col-md-4 col-form-label text-md-right">{{ __('Collection') }}</label>
        
                                    <div class="col-md-6">
                                        <select name="collection_id" class="custom-select">
                                            @foreach ($collections as $collection)
                                                <option value="{{$collection->id}}">{{$collection->name}}</option>
                                            @endforeach
                                          </select>
                                    </div>
                                </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Create item') }}
                                    </button>
                                    <a href="/" class="btn btn-secondary">
                                        {{ __('Cancel') }}
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection