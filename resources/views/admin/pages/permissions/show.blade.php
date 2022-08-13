@extends('adminlte::page')

@section('title', "Detalhes do $permission->name")

@section('content_header')
    <h1>Detalhes do <b> {{$permission->name}} </b>  <a href=" {{ route('permissions.index') }} " class="btn btn-dark">Lista de Permissão</a> </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome:</strong> {{$permission->name}}
                </li>
                <li>
                    <strong>Descrição:</strong> {{$permission->description}}
                </li>
            </ul>

            @include('admin.includes.alerts')


        </div> 
       
    </div>
    <button class="btb btn-warning" style="width: 100px">
        <a class="text-white" href=" {{ route('permissions.edit', $permission->id)}} ">Editar</a> 
    </button>
@stop
