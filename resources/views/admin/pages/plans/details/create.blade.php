@extends('adminlte::page')

@section('title', 'Adicionar novo detalhe do {{$plan->name}} ')


@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item"> 
        <a href=" {{ route('admin.index') }} ">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <a href=" {{ route('plans.index') }} ">Planos</a>
    </li>
    <li class="breadcrumb-item">
        <a href=" {{ route('plans.show', $plan->url) }} "> {{$plan->name}} </a>
    </li>
    <li class="breadcrumb-item active">
        <a href=" {{ route('plans.details.create', $plan->url) }} " class="active">Novo</a>
    </li>
</ol>

    <h1>Adicionar novo detalhe do {{$plan->name}}</h1>

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action=" {{route('plans.details.store', $plan->url)}} " method="post">
            @include('admin.pages.plans.details._partials.form')
            <div class="form-group">
                <button type="submit" class="btn btn-success">Cadastrar</button>
            </div>
            </form>
        </div>
    </div>
@endsection