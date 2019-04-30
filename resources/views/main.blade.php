
@extends('layouts.app')
 
 @section('content') 
  
 	@include('admin.template.partes.navegacion')
    @include('admin.template.partes.posteos',[$articulos])

  @endSection()

 

