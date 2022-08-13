@extends('adminlte::page')

@section('title', 'Permissões')


@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item"> 
        <a href=" {{ route('admin.index') }} ">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">
        <a href=" {{ route('permissions.index') }} ">Permissões</a>
    </li>
</ol>

    <h1>Permissões <a href=" {{ route('permissions.create') }} " class="btn btn-dark"> <i class="fa fa-plus-circle" aria-hidden="true"></i>   Cadastrar </a></h1>

@stop

@section('content')
    <div class="card">
        <div class="card-header">
            
            <form action=" {{ route('permissions.search')}}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Nome" class="form-control" value=" {{$filters['filter'] ?? ''}} ">
                <button type="submit" class="btn btn-dark">Filtrar</button>
            </form>

            
        </div>
        <div class="card-body">

            @include('admin.includes.alerts')
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $permission)
                        <tr>
                            <td>
                                {{ $permission->name }}
                            </td>
                            <td style="width:220px">
                                <button class="btb btn-success">
                                    <a class="text-white" href=" {{route('permissions.show', $permission->id) }} ">Ver</a> 
                                </button>
                                <button class="btb btn-warning">
                                    <a class="text-white" href=" {{route('permissions.edit', $permission->id)}} ">Editar</a> 
                                </button>
                                
                                <form style="display: contents" action="{{ route('permissions.destroy', $permission->id) }}" method="POST">
                                    @csrf
                                   
                                    @method('DELETE')
                                    <button type="submit" class="btb btn-danger">Deletar</button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
            {!! $permissions->appends($filters)->links() !!}
            @else
                {!! $permissions->links() !!}
            @endif
       
        </div>
    </div>
@stop



