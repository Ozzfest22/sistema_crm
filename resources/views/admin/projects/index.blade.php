@extends('adminlte::page')

@section('title', 'Proyectos')

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
                    <h1>Listado de Proyectos</h1>
                </div>
                <div class="card-body">
                    <a href="{{ route('admin.projects.create') }}" class="btn btn-primary mb-3">Nuevo Proyecto</a>
                    <table class="table table-bordered" id="project_table">
                        <thead>
                            <tr>
                                <td>Proyecto</td>
                                <td>Descripcion</td>
                                <td>Fecha Limite</td>
                                <td>Status</td>
                                <td>Usuario</td>
                                <td>Cliente</td>
                                <td>Acciones</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($projects as $project)
                            <tr>
                                <td>{{ $project->name }}</td>
                                <td>{{ $project->description }}</td>
                                <td>{{ $project->deadline }}</td>
                                <td>{{ $project->status }}</td>
                                <td>{{ $project->user->name }}</td>
                                <td>{{ $project->client->contact_name }}</td>                              
                                <td>
                                    <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                    <form action="{{ route('admin.projects.destroy', $project->id) }}" id="delete_form" method="POST" 
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
        $('#project_table').DataTable({
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