@extends('adminlte::page')

@section('title', 'Cadastrar Novo Perfil')

@section('content_header')
    <h1>Cadastrar <a href=" {{ route('permissions.index') }} " class="btn btn-dark">Cadastrar novo perfi</a> </h1>
@stop

@section('content')
    <div class="card">
         <div class="card-body">
            <form action=" {{ route('permissions.store') }} " class="form" method="POST">
                @csrf

                @include('admin.pages.permissions._partials.form')
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Cadastrar</button>
                </div>
            </form>
         </div>
    </div>
@stop
 

