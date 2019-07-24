@extends('layouts.pub')

@section('content')
<link rel="stylesheet" href="{{ asset('css/bootstrap-tagsinput.css') }}">
<div class="container">
    <div class="row">
        <div class="col-sm-8 offset-md-2">
            <h1 class="page-header">Crear publicacion</h1>

           
            <br>
            <form action="{{ route('guardar-servicio') }}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="titulo">Titulo</label>
                    <input type="text" name="titulo" id="titulo" class="form-control">
                </div>
                <div class="form-group">
                    <label for="categoriaServ">Categoría</label> 
                        <div>
                            <select input id="categoriaServ" name="categoriaServ" class="form-control nice-select open">
                                  
                                            <option value="">Seleccione categoría</option>
                                       
                                            @foreach ($categorias as $categoria)
                                            <option value="{{ $categoria->categoriaID }}">{{ $categoria->descripcion }}</option>
                                            @endforeach
                            </select>
                        </div>
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripcion</label>
                    <textarea type="text" name="descripcion" id="descripcion" class="form-control" rows="7"></textarea>
                </div>
                <div class="form-group">
                    <label for="incluye">Incluye</label>
                    <textarea type="text" name="incluye" id="incluye" class="form-control"  rows="2"></textarea>
                </div>
                <div class="form-group">
                    <label for="no_incluye">No incluye</label>
                    <textarea type="text" name="no_incluye" id="no_incluye" class="form-control" rows="2"></textarea>
                </div>
                
                <div class="form-group card card-body bg-secondary">
                    <label for="tags">Etiquetas (palabras separadas por coma)</label>
                    <input type="text" name="tags" data-role="tagsinput" id="tags" class="form-control">
                </div>
                
                <div class="form-group">
                    <label for="image">Seleccionar imagen</label>
                    <input type="file" name="image">
                </div>
                
                <div class="form-group">
                    <input type="submit" class="btn btn-lg btn-dark" value="Publicar">
                </div>
                
                
                
            </form>
        </div>
        

    </div>
   
</div>



@endsection
   
