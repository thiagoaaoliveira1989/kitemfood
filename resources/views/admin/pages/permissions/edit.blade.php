@extends('adminlte::page')

@section('title', "Editar Perfil  $permission->name  ")

@section('content_header')
    <h1>Editar Perfil de {{$permission->name}} </h1>
@stop

@section('content')
    <div class="card">
         <div class="card-body">
            <form action="{{route('permissions.update', $permission->id) }} " class="form" method="POST">
                @csrf
                @include('admin.pages.permissions._partials.form')
                <div class="form-group">
                    @method('PUT')
                    <button type="submit" class="btn btn-success">Atualizar Cadastro</button>
                </div>
            </form>
         </div>
    </div>
@stop
 

