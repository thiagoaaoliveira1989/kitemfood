@extends('adminlte::page')

@section('title', 'Planos')


@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item"> 
        <a href=" {{ route('admin.index') }} ">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">
        <a href=" {{ route('plans.index') }} ">Planos</a>
    </li>
</ol>

    <h1>Planos <a href=" {{ route('plans.create') }} " class="btn btn-dark"> <i class="fa fa-plus-circle" aria-hidden="true"></i>   Cadastrar </a></h1>

@stop

@section('content')
    <div class="card">
        <div class="card-header">
            
         

            <form action=" {{ route('plans.search') }} " method="POST" class="form form-inline">
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
                        <th>Preço</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($plans as $plan)
                        <tr>
                            <td>
                                {{ $plan->name }}
                            </td>
                            <td>
                                R$ {{ number_format($plan->price, 2, ',', '.') }}
                            </td>
                            <td style="width:280px">
                                <button class="btb btn-primary">
                                    <a class="text-white" href=" {{ route('plans.details.index', $plan->url) }} ">Detalhes</a> 
                                </button>
                                <button class="btb btn-success">
                                    <a class="text-white" href=" {{ route('plans.show', $plan->url) }} ">Ver</a> 
                                </button>
                                <button class="btb btn-warning">
                                    <a class="text-white" href=" {{ route('plans.edit', $plan->url)}} ">Editar</a> 
                                </button>
                                
                                <form style="display: contents" action="{{ route('plans.destroy', $plan->url) }}" method="POST">
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
            {!! $plans->appends($filters)->links() !!}
            @else
                {!! $plans->links() !!}
            @endif
       
        </div>
    </div>
@stop



