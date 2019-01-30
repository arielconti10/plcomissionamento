@extends('adminlte::page')

@section('title', 'AdminLTE')
<div class="container">

    @section('content_header')
        <h1>Funcionários</h1>
    @stop

    @section('content')
        <div class="row">
            <div class="col-md-12">

                <div class="box box-primary">
                    <div class="box-header with-border"><h2>Editar Funcionário</h2></div>
                    <form method="post" action="{{ route('employees.update', $employee->id) }}">
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
                                <input class="form-control" type="text" name="name" value="{{ $employee->name }}">
                            </div>
                            <div class="form-group">
                                <label for="document">CPF</label>
                                <input class="form-control" type="text" name="document" value="{{ $employee->document }}">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input class="form-control" type="text" name="email" value="{{ $employee->email }}">
                            </div>

                            <div class="form-group">
                                <label for="shop">Email</label>
                                <select class="form-control" name="shop" >
                                    @foreach($shops as $shop)
                                        <option value="{{ $shop->id }}" {{ $employee->shop->id === $shop->id ? 'selected' : '' }}>{{ $shop->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Atualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @stop
</div>
