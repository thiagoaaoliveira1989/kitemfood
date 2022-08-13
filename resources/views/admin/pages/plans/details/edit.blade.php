@extends('adminlte::page')

@section('title', "Editar detalhes do  $detail->name  ")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href=" {{ route('admin.index') }} ">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href=" {{ route('plans.index') }} ">Planos</a>
        </li>
        <li class="breadcrumb-item">
            <a href=" {{ route('plans.show', $plan->url) }} "> {{ $plan->name }} </a>
        </li>
        <li class="breadcrumb-item active">
            <a href=" {{ route('plans.details.index', $plan->url) }} ">Detalhes</a>
        </li>
        <li class="breadcrumb-item active">
            <a href=" {{ route('plans.details.edit', [$plan->url, $detail->id]) }} " class="active">Editar</a>
        </li>
    </ol>


    <h1>Editar {{ $detail->name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action=" {{ route('plans.details.update', [$plan->url, $detail->id]) }} " class="form" method="POST">
                @csrf
                @method('PUT')

                @include('admin.pages.plans.details._partials.form')
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Atualizar Cadastro</button>
                </div>
            </form>
        </div>
    </div>
@stop
