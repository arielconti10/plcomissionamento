@extends('adminlte::page')

@section('title', 'AdminLTE')
<div class="container">

    @section('content_header')
        <h1>Funcionários</h1>
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
                        <h3 class="box-title">Lista de funcionários cadastrados</h3>
                    </div>
                    <div class="box-body">
                        <a href="/employees/create" class="btn btn-primary">Novo funcionário</a>
                        <br />
                        <br />
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Nome</th>
                                <th>Documento</th>
                                <th>E-mail</th>
                                <th>Loja</th>
                                {{--<th>Ações</th>--}}
                            </tr>
                            @foreach($employees as $employee)
                                <tr>
                                    <td>{{ $employee->id }}</td>
                                    <td>{{ $employee->name }}</td>
                                    <td>{{ $employee->document }}</td>
                                    <td>{{ $employee->email }}</td>
                                    <td> {{ $employee->shop->name}} </td>

                                    <td>
                                        <form
                                                style="display: inline-block;margin: 0 0 0 10px ;width: 60px;"
                                                action="{{ route('employees.destroy', $employee->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit">Delete</button>
                                        </form>
                                        <a style="float: left" href="{{ route('employees.edit',$employee->id)}}" class="btn btn-primary">Editar</a>
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
