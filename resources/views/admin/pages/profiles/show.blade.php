@extends('adminlte::page')

@section('title', "Detalhes do $profile->name")

@section('content_header')
    <h1>Detalhes do <b> {{$profile->name}} </b>  <a href=" {{ route('profiles.index') }} " class="btn btn-dark">Lista de Perfis</a> </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome:</strong> {{$profile->name}}
                </li>
                <li>
                    <strong>Descrição:</strong> {{$profile->description}}
                </li>
            </ul>

            @include('admin.includes.alerts')


        </div> 
       
    </div>
    <button class="btb btn-warning" style="width: 100px">
        <a class="text-white" href=" {{ route('profiles.edit', $profile->id)}} ">Editar</a> 
    </button>
@stop
