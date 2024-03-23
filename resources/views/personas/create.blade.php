@extends('personas.layout')
    
@section('content')
  
<div class="card mt-5">
  <h2 class="card-header">Agregar nueva persona</h2>
  <div class="card-body">
  
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-primary btn-sm" href="{{ route('personas.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
    </div>
  
    <form action="{{ route('personas.store') }}" method="POST">
        @csrf
  
        <div class="mb-3">
            <label for="inputNombre" class="form-label"><strong>Nombre:</strong></label>
            <input 
                type="text" 
                name="nombre" 
                class="form-control @error('nombre') is-invalid @enderror" 
                id="inputName" 
                placeholder="Nombre">
            @error('nombre')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
  
        <div class="mb-3">
            <label for="inputApellido" class="form-label"><strong>Apellido:</strong></label>
            <textarea 
                class="form-control @error('apellido') is-invalid @enderror" 
                style="height:150px" 
                name="apellido" 
                id="inputDetail" 
                placeholder="Apellido"></textarea>
            @error('apellido')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="inputTelefono" class="form-label"><strong>Telefono:</strong></label>
            <textarea 
                class="form-control @error('telefono') is-invalid @enderror" 
                style="height:150px" 
                name="telefono" 
                id="inputTelefono" 
                placeholder="Telefono"></textarea>
            @error('telefono')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
    </form>
  
  </div>
</div>
@endsection