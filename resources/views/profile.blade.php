@extends('layouts.app')

@section('titulo')
            Perfil
 @endsection

@section('extraScripts')
<script src="{{ asset('js/profileLogic.js') }}" defer></script>
@endsection

@section('extraStyles')
    <link href="{{asset('css/profileView.css')}}" rel="stylesheet">
@endsection


@section('extraContent')
{{--credits to https://bootsnipp.com/snippets/E1nNa --}}
<div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">
                        <div class="card-title mb-4">
                            <div class="d-flex justify-content-start">
                                <div class="image-container">
                                    <img src="http://placehold.it/150x150" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />
                                    <div class="middle">
                                        <input type="button" class="btn btn-secondary" id="btnChangePicture" value="Change" />
                                        <input type="file" style="display: none;" id="profilePicture" name="file" />
                                    </div>
                                </div>
                                <div class="userData ml-3">
                                    <h2 class="d-block" style="font-size: 1.5rem; font-weight: bold"><a href="javascript:void(0);"> </a></h2>
                                    <h6 class="d-block"><a href="javascript:void(0)">1,500</a> Lists Uploaded</h6>
                                </div>
                                <div class="ml-auto">
                                    <input type="button" class="btn btn-primary d-none" id="btnDiscard" value="Discard Changes" />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="basicInfo-tab" data-toggle="tab" href="#basicInfo" role="tab" aria-controls="basicInfo" aria-selected="true">Info del Perfil</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="connectedServices-tab" data-toggle="tab" href="#connectedServices" role="tab" aria-controls="connectedServices" aria-selected="false">Listas del Usuario</a>
                                    </li>
                                </ul>
                                <div class="tab-content ml-1" id="myTabContent">
                                    <div class="tab-pane fade show active" id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">
                                        

                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Nombre de Usuario</label>
                                            </div>
                                            <div class="col-md-8 col-6" id="username">
                                                {{ Auth::user()->name }}
                                            </div>
                                        </div>
                                        <hr />

                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">E-Mail</label>
                                            </div>
                                            <div class="col-md-8 col-6" id="UserBirthdate">
                                            {{ Auth::user()->email }}
                                            </div>
                                        </div>
                                        <hr />
                                        
                                        
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Something</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                Something
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Something</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                Something
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Something</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                            @if(!$listas->isEmpty()) 
                                                @foreach($lista as $listas)
                                                    <li> {{ $lista->titulo }} </li>
                                                @endfoeach
                                        
                                            @else
                                                <div class="alert alert-primary divAlerta" role="alert">
                                                        <h4 class="alert-heading">Nada que ver por aquí</h4>
                                                        <p class="mb-0"> poruqé no creas unas listas? <p>
                                                </div>
                                            @endif
                                            </div>
                                        </div>
                                        <hr />

                                    </div>
                                    <div class="tab-pane fade" id="connectedServices" role="tabpanel" aria-labelledby="CreatedLists-tab">
      
                             
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection