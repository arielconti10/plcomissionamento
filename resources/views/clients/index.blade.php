@extends('adminlte::page')

@section('title', 'AdminLTE')
<div class="container">

@section('content_header')
    <h1>Clients</h1>
@stop

@section('content')
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Bordered Table</h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Nome</th>
                                <th>Documento</th>
                                <th>Telefone</th>
                                <th>Ações</th>
                            </tr>
                            @foreach($clients as $client)
                                <tr>
                                    <td>{{ $client->id }}</td>
                                    <td>{{ $client->name }}</td>
                                    <td>{{ $client->document }}</td>
                                    <td>
                                        {{ $client->telephone }}
                                    </td>

                                    <td>
                                        <a href="{{ route('clients.edit',$client->id)}}"
                                           class="btn btn-primary">Editar</a>
                                        <form
                                            style="float: left;margin: 0 10px 0 0;width: 60px;"
                                            action="{{ route('clients.destroy', $client->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
@stop
</div>
