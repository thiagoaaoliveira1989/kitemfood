@extends('adminlte::page')

@section('title', "Editar Perfil  $profile->name  ")

@section('content_header')
    <h1>Editar Perfil de {{$profile->name}} </h1>
@stop

@section('content')
    <div class="card">
         <div class="card-body">
            <form action="{{route('profiles.update', $profile->id) }} " class="form" method="POST">
                @csrf
                @include('admin.pages.profiles._partials.form')
                <div class="form-group">
                    @method('PUT')
                    <button type="submit" class="btn btn-success">Atualizar Cadastro</button>
                </div>
            </form>
         </div>
    </div>
@stop
 

