@extends('adminlte::page')

@section('title', 'Perfis')


@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item"> 
        <a href=" {{ route('admin.index') }} ">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">
        <a href=" {{ route('profiles.index') }} ">Perfis</a>
    </li>
</ol>

    <h1>Perfis <a href=" {{ route('profiles.create') }} " class="btn btn-dark"> <i class="fa fa-plus-circle" aria-hidden="true"></i>   Cadastrar </a></h1>

@stop

@section('content')
    <div class="card">
        <div class="card-header">
            
         

            <form action=" {{ route('profile.search')}}" method="POST" class="form form-inline">
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
                        <th>Descrição</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($profiles as $profile)
                        <tr>
                            <td>
                                {{ $profile->name }}
                            </td>
                            <td>
                                {{ $profile->description}}
                            </td>
                            <td style="width:230px">
                                <button class="btb btn-success">
                                    <a class="text-white" href=" {{route('profiles.show', $profile->id) }} ">Ver</a> 
                                </button>
                                <button class="btb btn-warning">
                                    <a class="text-white" href=" {{route('profiles.edit', $profile->id)}} ">Editar</a> 
                                </button>
                                <button class="btb btn-warning">
                                    <a class="text-white" href=" {{route('profiles.permissions', $profile->id)}} "><i class="fas fa-lock" aria-hidden="true"></i></a> 
                                </button>
                                <form style="display: contents" action="{{ route('profiles.destroy', $profile->id) }}" method="POST">
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
            {!! $profiles->appends($filters)->links() !!}
            @else
                {!! $profiles->links() !!}
            @endif
       
        </div>
    </div>
@stop



