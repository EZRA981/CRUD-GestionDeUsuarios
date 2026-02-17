@extends('layouts.app')

@section('content')
<div class="py-4">
    <h1>Lista de clientes</h1>

    <div class="mb-3">
        <a href="{{ route('clientes.create') }}" 
           class="btn btn-primary">
           Nuevo cliente
        </a>
    </div>

    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->id }}</td>
                    <td>{{ $cliente->nombre }}</td>
                    <td>{{ $cliente->email }}</td>
                    <td>{{ $cliente->telefono }}</td>
                    <td>
                        <a href="{{ route('clientes.show', $cliente->id) }}" 
                            class="btn btn-info btn-sm">Deta;;es</a>
                        <a href="{{ route('clientes.edit', $cliente->id) }}" 
                           class="btn btn-warning btn-sm">
                           Editar
                        </a>
                        <form action="{{ route('clientes.destroy', $cliente->id) }}" 
                              method="POST" 
                              style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('¿Seguro que deseas eliminar este cliente?')">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $clientes->links() }}
    </div>
</div>
@endsection
