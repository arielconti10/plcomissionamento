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
                    <div class="box-header with-border"><h2>Editar contrato</h2></div>
                    <form method="post" action="{{ route('contracts.update', $contract->id) }}">
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
{{--                                        <option {{ $clients->id == $contract->client->id ? 'selected' : '' }} value="{{ $client->id }}">{{ $client->name }}</option>--}}
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="contract_type">Tipo de contrato</label>
                                <select name="contract_type" id="contract_type" class="form-control">
                                    <option {{ $contract->contract_type == 'NOVO' ? 'selected' : '' }} value="NOVO">NOVO</option>
                                    <option {{ $contract->contract_type == 'NOVO' ? 'selected' : '' }}  value="REFIN">REFIN</option>
                                </select>
                                {{--<input class="form-control" type="text" name="contract_type" placeholder="Tipo de contrato" >--}}
                            </div>

                            <div class="form-group">
                                <label for="value">Valor do contrato</label>
                                <input class="form-control" value="{{ $contract->value }}" type="text" name="value" placeholder="Valor do contrato" >
                            </div>
                            <div class="form-group">
                                <label for="telephone">Orgão</label>
                                <input class="form-control" value="{{ $contract->organ }}" type="text" name="organ" placeholder="Orgão" >
                            </div>
                            <div class="form-group">
                                <label for="employee">Funcionário</label>
                                <select name="employee" class="form-control">
                                    <option>Selecione um funcionário</option>

                                    @foreach($employees as $employee)
                                        <option {{ $contract->employee->id == $employee->id ? 'selected' : ''}} value="{{ $employee->id }}">
                                            {{ $employee->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="bank">Banco</label>
                                <input class="form-control" type="text" name="bank" placeholder="Banco" >
                            </div>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    @stop
</div>
