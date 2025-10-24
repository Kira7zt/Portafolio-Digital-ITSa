@extends('adminlte::page')

@section('content')
<div class="container">
    <h1>Documentación</h1>
    <a href="{{ route('Documentacion.create') }}" class="btn btn-primary">Nuevo Documento</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Archivo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($documentacions as $doc)
                <tr>
                    <td>{{ $doc->id }}</td>
                    <td>{{ $doc->titulo }}</td>
                    <td>{{ $doc->archivo }}</td>
                    <td>
                        <a href="{{ route('Documentacion.edit', $doc->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('Documentacion.destroy', $doc->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" onclick="return confirm('¿Eliminar documento?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection