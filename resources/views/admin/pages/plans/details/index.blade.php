@extends('adminlte::page')

@section('title', "Detalhe do  $plan->name   ")


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
        <a href=" {{ route('plans.details.index', $plan->url) }} " class="active">Detalhes</a>
    </li>
</ol>

    <h1>Detalhes do {{$plan->name}} <a href=" {{ route('plans.details.create', $plan->url) }} " class="btn btn-dark"> <i class="fa fa-plus-circle" aria-hidden="true"></i>   Cadastrar </a></h1>

@stop

@section('content')
    <div class="card">
        
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($details as $detail)
                        <tr>
                            <td>
                                {{ $detail->name }}
                            </td>
                            <td style="width:200px">
                                <button class="btb btn-success">
                                    <a class="text-white" href=" {{ route('plans.show', $plan->url) }} ">Ver</a> 
                                </button>
                                <button class="btb btn-warning">
                                    <a class="text-white" href=" {{ route('plans.details.edit', [$plan->url, $detail->id])}} ">Editar</a> 
                                </button>
                                
                                <form style="display: contents" action="{{ route('plans.details.destroy', [$plan->url, $detail->id]) }}" method="POST">
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
            {!! $details->appends($filters)->links() !!}
            @else
                {!! $details->links() !!}
            @endif
       
        </div>
    </div>
@stop



