@extends('adminlte::page')

@section('title', 'Promociones')

@section('content_header')
    <h1>Editar Promoción</h1>
@stop

@section('content')

@php
$pagina = \App\Models\Pagina::where('path', '=', request()->path())->first();
@endphp


    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
  <form action="{{ route('productos.update', $producto) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
      <x-adminlte-input name="titulo" label="Titulo"
          fgroup-class="col-md-6" disable-feedback  value="{{ old('titulo', $producto->titulo) }}"/>
      @error('titulo')
            <small class="text-danger">*{{ $message }}</small>
            <br><br>
        @enderror
      <x-adminlte-input name="autor" label="Autor"
      fgroup-class="col-md-6" disable-feedback  value="{{ old('autor', $producto->autor) }}"/>
      @error('autor')
            <small class="text-danger">*{{ $message }}</small>
            <br><br>
      @enderror

      <x-adminlte-input  name="descripcion" label="Descripción"
      fgroup-class="col-md-6" disable-feedback value="{{ old('autor', $producto->descripcion) }}"/>

      @error('descripcion')
      <small class="text-danger">*{{ $message }}</small>
      <br><br>
      @enderror
      <x-adminlte-input type="number" name="precio" label="Precio (Bs)" placeholder="80"
      fgroup-class="col-md-6" disable-feedback value="{{ old('autor', $producto->precio) }}"/>
      @error('precio')
      <small class="text-danger">*{{ $message }}</small>
      <br><br>
      @enderror
      <x-adminlte-input type="number" name="stock" label="Stock" placeholder="50"
      fgroup-class="col-md-6" disable-feedback value="{{ old('autor', $producto->stock) }}"/>
      @error('stock')
      <small class="text-danger">*{{ $message }}</small>
      <br><br>
      @enderror

      <div class="form-group col-md-6">
        <label for="exampleFormControlSelect1">Genero</label>
        <select name="id_genero" class="form-control" id="exampleFormControlSelect1" value="{{ old('autor', $producto->id_genero) }}" required>
         @foreach ($generos as $genero)
            @if ($genero->id == $producto->id_genero)
                 <option value="{{ $genero->id }}" selected>{{ $genero->nombre }}</option>
            @else
              <option value="{{ $genero->id }}">{{ $genero->nombre }}</option>
            @endif
         @endforeach
        </select>
      </div>
      @error('id_genero')
      <small class="text-danger">*{{ $message }}</small>
      <br><br>
      @enderror

      <div class="form-group col-md-6">
        <label for="exampleFormControlSelect1">Promoción</label>
        <select name="id_promocion" class="form-control" id="exampleFormControlSelect1" value="{{ old('autor', $producto->id_promocion) }}">
          <option value="" disabled>Seleccionar Promoción</option>
         @foreach ($promociones as $promocion)
            @if ($promocion->id == $producto->id_promocion)
              <option value="{{ $promocion->id }}">{{ $promocion->nombre }}</option>
            @else
              <option value="{{ $promocion->id }}">{{ $promocion->nombre }}</option>    
            @endif
         @endforeach
        </select>
      </div>
      @error('id_promocion')
      <small class="text-danger">*{{ $message }}</small>
      <br><br>
      @enderror

      <x-adminlte-input-file type="file" class="col-md-6" name="imagen" label="Imagen (JPG, PNG, JPEG)" placeholder="Elija una imagen..."
      disable-feedback/>
      @error('imagen')
      <small class="text-danger">*{{ $message }}</small>
      <br><br>
      @enderror
      
  </div>
  <button type="submit" class="btn btn-primary mb-4">
    Guardar
  </button>
  </form>

@stop

@section('footer')
<p class="text-primary">Visitas: {{ $pagina->visitas }}</p>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop