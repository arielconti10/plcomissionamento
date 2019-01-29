@extends('adminlte::page')
@section('title', 'AdminLTE')
<div class="container">
@section('content_header')
    <h1>Novo Cliente</h1>
@stop
@section('content')
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border"><h2>Novo Cliente</h2></div>
                    <form method="post" action="{{ route('clients.store') }}">
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
                                <label for="telephone">Telefone</label>
                                <input class="form-control" type="text" name="telephone" >
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @stop
</div>
