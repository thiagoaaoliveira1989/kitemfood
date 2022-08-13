@extends('adminlte::page')

@section('title', "Detalhes do {$plan->name}")

@section('content_header')
    <h1>Detalhes do <b> {{$plan->name}} </b>  <a href=" {{ route('plans.index') }} " class="btn btn-dark">Lista de Planos</a> </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome:</strong> {{$plan->name}}
                </li>
                <li>
                    <strong>URL:</strong> {{$plan->url}}
                </li>
                <li>
                    <strong>Preço:</strong> R$ {{ number_format($plan->price, 2, ',', '.') }}
                </li>
                <li>
                    <strong>Descrição:</strong> {{$plan->description}}
                </li>
            </ul>

            @include('admin.includes.alerts')


        </div> 
       
    </div>
    <button class="btb btn-warning" style="width: 100px">
        <a class="text-white" href=" {{ route('plans.edit', $plan->url)}} ">Editar</a> 
    </button>
@stop
