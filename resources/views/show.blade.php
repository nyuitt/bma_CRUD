@extends('app')

@section('content')
    <h1 class="page-header text-center">BMA CRUD WITH LARAVEL</h1>
    <div class="row">
        <div class="col-md-12 col-md-offset-1">
            <h2>Lista de Membros
                <button type="button" data-bs-toggle="modal" data-bs-target="#addnew" class="btn btn-primary pull-right"><i class="fa fa-plus"></i>Membros</button>
            </h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-md-offset-1">
            <table class="table table-bordered table-responsive table-striped">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Sobrenome</th>
                        <th>Email</th>
                        <th>Data de criação</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($members as $member)
                        <tr>
                            <td>{{$member->first_name}}</td>
                            <td>{{$member->last_name}}</td>
                            <td>{{$member->email}}</td>
                            <td>{{$member->created}}</td>
                            <td>
                                <a href="#edit{{$member->id}}" data-bs-toggle="modal" class="btn btn-success"><i class='fa fa-edit'></i>Editar</a> 
                                <a href="#delete{{$member->id}}" data-bs-toggle="modal" class="btn btn-danger"><i class='fa fa-trash'></i>Excluir</a>
                                @include('action')
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
