@extends('adminlte::page')

@section('title', 'AdminLTE')
<div class="container">
    @section('content_header')
        <h1>Lojas</h1>
    @stop

    @section('content')
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br />
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Lista de lojas cadastradas</h3>
                    </div>
                    <div class="box-body">
                        <a href="/shops/create" class="btn btn-primary">Nova loja</a>
                        <br />
                        <br />
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Nome</th>
                                <th>Endereço</th>
                            </tr>
                            @foreach($shops as $shop)
                                <tr>
                                    <td>{{ $shop->id }}</td>
                                    <td>{{ $shop->name }}</td>
                                    <td>{{ $shop->address}}</td>

                                    <td>
                                        <form
                                                style="display: inline-block;margin: 0 0 0 10px ;width: 60px;"
                                                action="{{ route('shops.destroy', $shop->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit">Delete</button>
                                        </form>
                                        <a style="float: left" href="{{ route('shops.edit',$shop->id)}}" class="btn btn-primary">Editar</a>
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
