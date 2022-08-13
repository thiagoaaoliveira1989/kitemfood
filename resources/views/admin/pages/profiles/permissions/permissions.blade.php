@extends('adminlte::page')

@section('title', "Permissões do perfil {$profiles->name}")


@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href=" {{ route('admin.index') }} ">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">
            <a href=" {{ route('permissions.index') }} ">Permissões do perfil</a>
        </li>
    </ol>

    <h1>Lista de Permissões <strong> {{ $profiles->name }} </strong> </h1>
    <a href=" {{ route('profiles.permissions.available', $profiles->id) }} " class="btn btn-dark">
        <i class="fa fa-plus-circle" aria-hidden="true"></i>Cadastrar nova Permissão </a>


@stop

@section('content')
    <div class="card">
        <div class="card-header">
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
                            <td style="width:250px">
                                <button class="btb btn-success">
                                    <a class="text-white" href=" {{ route('permissions.show', $permission->id) }} ">Ver</a>
                                </button>

                                <button class="btb btn-danger">
                                    <a class="text-white"
                                        href=" {{ route('profiles.permissions.detach', [$profiles->id, $permission->id]) }} ">Remover</a>
                                </button>

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
