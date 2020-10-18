@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row ">
        <div class="card col-12" >
            <div class="card-body">
                <div class="col-12">
                    <h1 class="card-title">Veículos</h1>
                </div>
                <div class="col-12">
                    <form action="{{route('artigos.search')}}" method="post" class="form">
                        @csrf
                            <div class="row">
                                <div class="col-5 ">
                                    <input type="text" name="filter" placeholder="filtrar pelo nome do veiculo" value="{{$filters['filter'] ?? ''}}" class="form-control" >
                                </div>
                                <div class="col-4">
                                    <button type="submit" class="btn btn-success">Pesquisar</button>    
                                    <a href="{{url('/home')}}" class="btn btn-info">Voltar</a>
                                </div>
                            </div>
                    </form>
                </div>
                <br>
                <div class="col-12">
                    @if(session('info'))
                    <div class="alert alert-info">
                        <h5><b>{{ session('info') }}</b></h5>
                    </div>
                    @endif 
                </div>
                <br>
                <div class="col-12">
                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <th>Imagem</th>
                            <th>link</th>
                            <th>Nome Veículo</th>
                            <th>Ano</th>
                            <th>Combustível</th>
                            <th>Quilometragem</th>
                            <th>Portas</th>
                            <th>cambio</th>
                            <th>cor</th>
                            <th width="100">Ações</th>
                        </thead>
                        <tbody>
                            @foreach ($artigos as $artigo)
                            <tr>
                                <td>
                                    @if(isset($artigo->img_url))
                                        <img src="<?php echo $artigo->img_url;?>" style="max-width=120px;max-height:60px;">
                                    @endif
                                </td>
                                <td>
                                    <a href={{$artigo->link}} target=_blank>Link para {{$artigo->nome_veiculo}}</a>
                                </td>
                                <td>
                                    {{$artigo->nome_veiculo}}
                                </td>
                                <td>
                                    {{$artigo->ano}}
                                </td>
                                <td>
                                    {{$artigo->combustivel}}
                                </td>
                                <td>
                                    {{$artigo->quilometragem}}
                                </td>
                                
                                <td>
                                    {{$artigo->portas}}
                                </td>
                                
                                <td>
                                    {{$artigo->cambio}}
                                </td>
                                <td>
                                    {{$artigo->cor}}
                                </td>
                                
                                <td>
                                    <form action="{{ route('artigos.destroy', $artigo->id) }}" method="POST">
                                        {{ method_field('DELETE') }}
                                        @csrf
                                        <button type="submit" onclick="" class="btn btn-danger">Deletar </button>
                                    </form>
                                    <br>
                                    <a href="{{route ('artigos.show',$artigo->id)}}" class="btn btn-secondary">Detalhes</a>
                                </td>
                            </tr>    
                                
                            @endforeach
                        
                        
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-6">
                        <div class="container">
                            <p>
                                @if(isset($filters))
                                    {!! $artigos->appends($filters)->links("pagination::bootstrap-4") !!}
                                @else
                                    {!! $artigos->links("pagination::bootstrap-4") !!}
                                @endif
                            </p>
                            
                        </div>
                            
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>

    
</div>
<style>
    .last{
        background: #CCC;
    }
</style>
@endsection