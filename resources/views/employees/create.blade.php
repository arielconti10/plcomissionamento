@extends('adminlte::page')
@section('title', 'AdminLTE')
<div class="container">
@section('content_header')
    <h1>Novo Funcionário</h1>
@stop
@section('content')
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border"><h2>Novo Funcionário</h2></div>
                    <form method="post" action="{{ route('employees.store') }}">
                        <div class="box-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @method('POST')
                            @csrf
                            <div class="form-group">
                                <label for="name">Nome</label>
                                <input class="form-control" type="text" name="name" >
                            </div>
                            <div class="form-group">
                                <label for="document">CPF</label>
                                <input class="form-control" type="text" name="document" >
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input class="form-control" type="text" name="email" >
                            </div>

                            <div class="form-group">
                                <label for="shop">Loja</label>
                                <select class="form-control" name="shop">
                                    <option value="" default>Escolha uma loja</option>
                                    @foreach($shops as $shop)
                                        <option value="{{ $shop->id }}">{{$shop->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Salvar funcionário</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @stop
</div>
