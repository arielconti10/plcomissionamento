@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Lista de Contratos</h3>
                </div>
                <div class="box-body">
                    <a href="/contracts/create" class="btn btn-primary">Novo Contrato</a>
                    <br />
                    <br />
                    <table class="table table-bordered">
                        <tbody>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Cliente</th>
                            <th>Valor</th>
                            <th>Tipo de contrato</th>
                            <th>Orgão</th>
                            <th>Banco</th>
                            <th>Funcionário</th>
                            <th>Loja</th>
                        </tr>
                        @foreach($contracts as $contract)
                            <tr>
                                <td>{{ $contract->id }}</td>
                                <td> {{ $contract->client->name  }} </td>
                                <td>R${{ number_format($contract->value, 2, ',' , '') }}</td>
                                <td>{{ $contract->contract_type }}</td>
                                <td>{{ $contract->organ }}</td>
                                <td> {{ $contract->bank }} </td>
                                <td> {{ $contract->employee->name }} </td>
                                <td> {{ $contract->employee->shop->name }} </td>
                                <td>
                                    <form
                                            style="display: inline-block;margin: 0 0 0 10px ;width: 60px;"
                                            action="{{ route('contracts.destroy', $contract->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                    <a style="float: left" href="{{ route('contracts.edit',$contract->id)}}" class="btn btn-primary">Editar</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

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