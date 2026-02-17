@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow p-4">

                <h3 class="mb-3">Detalles del cliente</h3>

                <p><strong>Nombre:</strong> {{ $cliente->nombre }}</p>
                <p><strong>Email:</strong> {{ $cliente->email }}</p>
                <p><strong>Teléfono:</strong> {{ $cliente->telefono }}</p>
                <hr>
                <p>
                    <strong>Creado el:</strong> 
                    {{ $cliente->created_at->format('d/m/Y H:i') }}
                </p>
                <p>
                    <strong>ultima actualizacion:</strong> 
                    {{ $cliente->updated_at->format('d/m/Y H:i') }}
                </p>
                <a href="{{ route('clientes.index') }}" 
                   class="btn btn-secondary mt-3">
                   Volver
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
