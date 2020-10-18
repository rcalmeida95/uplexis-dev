@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        <div class="card col-12" >
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="">
                            <p class=""><h4 class="card-title">Capturar Veículos</h4></p>
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-md-12">
                        <form action="" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <input type="text" class="form-control" id="termo" name="termo">
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-primary">Capturar</button>
                                    <a href="{{route('artigos.index')}}" class="btn btn-success">Lista de Artigos</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <br>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        @if(session('info'))
                        <div class="alert alert-info">
                            <h5><b>{{ session('info') }}</b></h5>
                        </div>
                        @endif 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
