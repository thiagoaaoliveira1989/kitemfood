@extends('adminlte::page')

@section('title', "Editar  {$plan->name}")

@section('content_header')
    <h1>Editar {{$plan->name}} </h1>
@stop

@section('content')
    <div class="card">
         <div class="card-body">
            <form action=" {{ route('plans.update', $plan->url) }} " class="form" method="POST">
                @csrf
                @method('PUT')
                
                @include('admin.pages.plans._partials.form')
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Atualizar Cadastro</button>
                </div>
            </form>
         </div>
    </div>
@stop
 

