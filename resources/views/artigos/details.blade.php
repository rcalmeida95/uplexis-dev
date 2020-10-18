@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row ">
        <div class="card col-12" >
            <div class="card-body">
                <div class="col-12">
                    <img  src="<?php echo $artigo->img_url;?>" style="max-width=200px;max-height:400px;">
                        <h5 class="card-title">Veículo: <b>{{$artigo->nome_veiculo}}</b></h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Link: {{$artigo->link}}</li>
                        <li class="list-group-item">Ano:  {{$artigo->ano}}</li>
                        <li class="list-group-item">Combustível:  {{$artigo->combustivel}}</li>
                        <li class="list-group-item">Quilometragem:  {{$artigo->quilometragem}}</li>
                        <li class="list-group-item">Portas:  {{$artigo->portas}}</li>
                        <li class="list-group-item">Cor:  {{$artigo->cor}}</li>
                    </ul>
                       
                </div>
            </div>
            <div class="card-body">
                <a href="{{route('artigos.index')}}" class="btn btn-info">Voltar</a>
            </div>
        </div>
    </div>
    <br>

    
</div>

@endsection