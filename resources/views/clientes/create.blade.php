@extends('layouts.app')

    @section('content')
    <div class="card shadow">
        <h3>Registrar nuevo cliente</h3>
    </div>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                    <form action="{{ route('clientes.store') }}" method="POST" class="container">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nombre completo</label>    
                        <input type="text" name="nombre" class="form-control" required>
                    </div> 
                    <div class="mb-3">
                        <label class="form-label">Email</label>    
                        <input type="text" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Telefono</label>    
                        <input type="text" name="telefono" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Empresa</label>    
                        <input type="text" name="empresa" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success">Guardar cliente</button>
                        <a href="{{ route('clientes.index') }}" class="btn bti-secondary">Cancelar</a>
                    </div>
                </form>  
            </div>
        </div>
    </div>