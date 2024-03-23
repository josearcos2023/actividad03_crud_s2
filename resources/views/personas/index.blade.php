@extends('personas.layout')
   
@section('content')
  
<div class="card mt-5">
  <h2 class="card-header">Agenda de datos-CRUD</h2>
  <div class="card-body">
          
        @session('success')
            <div class="alert alert-success" role="alert"> {{ $value }} </div>
        @endsession
  
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-success btn-sm" href="{{ route('personas.create') }}"> <i class="fa fPHPa-plus"></i> Nueva persona</a>
        </div>
  
        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th width="80px">No</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Telefono</th>
                    <th width="250px">Acción</th>
                </tr>
            </thead>
  
            <tbody>
            @forelse ($personas as $persona)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $persona->nombre }}</td>
                    <td>{{ $persona->apellido }}</td>
                    <td>{{ $persona->telefono }}</td>
                    <td>
                        <form action="{{ route('personas.destroy',$persona->id) }}" method="POST">
             
                            <a class="btn btn-info btn-sm" href="{{ route('personas.show',$persona->id) }}"><i class="fa-solid fa-list"></i> Mostrar</a>
              
                            <a class="btn btn-primary btn-sm" href="{{ route('personas.edit',$persona->id) }}"><i class="fa-solid fa-pen-to-square"></i> Editar</a>
             
                            @csrf
                            @method('DELETE')
                
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Borrar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No hay información.</td>
                </tr>
            @endforelse
            </tbody>
  
        </table>
        
        {!! $personas->links() !!}
  
  </div>
</div>  
@endsection