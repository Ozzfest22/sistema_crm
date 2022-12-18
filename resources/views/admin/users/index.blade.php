@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')

@stop

@section('content')
<div class="container">
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-header bg-primary text-white">
                    <h1>Listado de Usuarios</h1>
                </div>
                <div class="card-body">
                    <a href="{{ route('admin.users.create') }}" class="btn btn-primary mb-3">Nuevo Usuario</a>
                    <table class="table table-bordered" id="user_table">
                        <thead>
                            <tr>
                                <td>Nombre</td>
                                <td>Email</td>
                                <td>Fecha verificacion email</td>
                                <td>Acciones</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->email_verified_at }}</td>
                                <td>
                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                    <form action="{{ route('admin.users.destroy', $user->id) }}" id="delete_form" method="POST" 
                                        style="display: inline-block;" onsubmit="return confirm('Está seguro de eliminar el registro?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
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
</div>
@stop

@section('css')

@stop

@section('js')
<script>
    $(document).ready(function() {
        $('#user_table').DataTable({
            language: {
                url: "https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
            },
            columnDefs: [{
                targets: -1,
                searching: false,
                orderable: false
            }]
        });
    });
</script>
@stop