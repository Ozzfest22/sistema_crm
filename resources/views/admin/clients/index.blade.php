@extends('adminlte::page')

@section('title', 'Clientes')

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
                    <h1>Listado de Clientes</h1>
                </div>
                <div class="card-body">
                    <a href="{{ route('admin.clients.create') }}" class="btn btn-primary mb-3">Nuevo Cliente</a>
                    <table class="table table-bordered" id="client_table">
                        <thead>
                            <tr>
                                <td>Nombre del cliente</td>
                                <td>Email del cliente</td>
                                <td>Telefono del cliente</td>
                                <td>Nombre de la Empresa</td>
                                <td>Direccion de la Empresa</td>
                                <td>Telefono de la Empresa</td>
                                <td>Acciones</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($clients as $client)
                            <tr>
                                <td>{{ $client->contact_name }}</td>
                                <td>{{ $client->contact_email }}</td>
                                <td>{{ $client->contact_phone_number }}</td>
                                <td>{{ $client->company_name }}</td>
                                <td>{{ $client->company_address }}</td>
                                <td>{{ $client->company_phone_number }}</td>
                                <td>
                                    <a href="{{ route('admin.clients.edit', $client->id) }}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                    <form action="{{ route('admin.clients.destroy', $client->id) }}" id="delete_form" method="POST" style="display: inline-block;" onsubmit="return confirm('Está seguro de eliminar el registro?')">
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
        $('#client_table').DataTable({
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