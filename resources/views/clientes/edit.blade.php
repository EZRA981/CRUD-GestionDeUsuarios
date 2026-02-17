@extends('layouts.app')
@section('content')
    <div class="card shadow">
    </div>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                    <form action="{{ route('clientes.update', $cliente->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <h3>Editar cliente</h3>
                    <div class="mb-3">
                        <label>Nombre</label>
                        <input type="text" name="nombre" 
                            value="{{ $cliente->nombre }}" 
                            class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" 
                            value="{{ $cliente->email }}" 
                            class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Teléfono</label>
                        <input type="text" name="telefono" 
                            value="{{ $cliente->telefono }}" 
                            class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>empresa</label>
                        <input type="text" name="empresa" 
                            value="{{ $cliente->empresa }}" 
                            class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Actualizar
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
