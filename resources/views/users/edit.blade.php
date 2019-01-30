@extends('adminlte::page')

@section('title', 'AdminLTE')
<div class="container">

@section('content_header')
    <h1>Clientes</h1>
@stop

@section('content')
        <div class="row">
            <div class="col-md-12">

                <div class="box box-primary">
                    <div class="box-header with-border"><h2>Editar Cliente</h2></div>
                    <form method="post" action="{{ route('clients.update', $client->id) }}">
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
                            @method('PATCH')
                            @csrf
                            <div class="form-group">
                                <label for="name">Nome</label>
                                <input class="form-control" type="text" name="nome" value="{{ $client->name }}">
                            </div>
                            <div class="form-group">
                                <label for="document">CPF</label>
                                <input class="form-control" type="text" name="document" value="{{ $client->document }}">
                            </div>
                            <div class="form-group">
                                <label for="telephone">Telefone</label>
                                <input class="form-control" type="text" name="telephone" value="{{ $client->telephone }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>

                </div>


            </div>
        </div>
@stop
</div>
