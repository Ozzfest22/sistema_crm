@extends('adminlte::page')

@section('title', 'Tareas')

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
                    <h1>Listado de Tareas</h1>
                </div>
                <div class="card-body">
                    <a href="{{ route('admin.tasks.create') }}" class="btn btn-primary mb-3">Nueva Tarea</a>
                    <table class="table table-bordered" id="task_table">
                        <thead>
                            <tr>
                                <td>Tarea</td>
                                <td>Descripcion</td>
                                <td>Fecha Limite</td>
                                <td>Status</td>
                                <td>Proyecto</td>
                                <td>Usuario</td>
                                <td>Cliente</td>
                                <td>Acciones</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tasks as $task)
                            <tr>
                                <td>{{ $task->name }}</td>
                                <td>{{ $task->description }}</td>
                                <td>{{ $task->deadline }}</td>
                                <td>{{ $task->task_status }}</td>
                                <td>{{ $task->project->name }}</td>
                                <td>{{ $task->user->name }}</td>
                                <td>{{ $task->client->contact_name }}</td>                               
                                <td>
                                    <a href="{{ route('admin.tasks.edit', $task->id) }}" class="btn btn-success">Editar</a>
                                    <form action="{{ route('admin.tasks.destroy', $task->id) }}" id="delete_form" method="POST" 
                                        style="display: inline-block;" onsubmit="return confirm('Está seguro de eliminar el registro?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
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
        $('#task_table').DataTable();
    });
</script>
@stop