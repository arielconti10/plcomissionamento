@extends('adminlte::page')
@section('title', 'AdminLTE')
<div class="container">
@section('content_header')
    <h1>Contratos</h1>
@stop
@section('content')
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border"><h2>Novo contrato</h2></div>
                    <form method="post" action="{{ route('contracts.store') }}">
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
                                <label for="name">Cliente</label>
                                <select class="form-control" name="client">
                                    <option>Selecione um cliente</option>
                                    @foreach($clients as $client)
                                        <option value="{{ $client->id }}">{{ $client->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="contract_type">Tipo de contrato</label>
                                <select name="contract_type" id="contract_type" class="form-control">
                                    <option value="NOVO">NOVO</option>
                                    <option value="REFIN">REFIN</option>
                                </select>
                                {{--<input class="form-control" type="text" name="contract_type" placeholder="Tipo de contrato" >--}}
                            </div>
                            <div class="form-group">
                                <label for="value">Valor do contrato</label>
                                <input class="form-control" type="number" step=".01" name="value" placeholder="Valor do contrato" >
                            </div>
                            <div class="form-group">
                                <label for="telephone">Orgão</label>
                                <input class="form-control" type="text" name="organ" placeholder="Orgão" >
                            </div>
                            <div class="form-group">
                                <label for="employee">Funcionário</label>
                                <select name="employee" class="form-control">
                                   <option>Selecione um funcionário</option>

                                    @foreach($employees as $employee)
                                        <option value="{{ $employee->id }}">
                                            {{ $employee->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="bank">Banco</label>
                                <input class="form-control" type="text" name="bank" placeholder="Banco" >
                            </div>

                            <div class="form-group">
                                <label for="bank">Porcentagem de comissão (%)</label>
                                <input class="form-control"
                                       type="number"
                                       name="comission_percentage"
                                       placeholder="Porcentagem de comissão"
                                       min="0"
                                       {{--value="5"--}}
                                       {{--disabled--}}
                                >
                            </div>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @stop
</div>
