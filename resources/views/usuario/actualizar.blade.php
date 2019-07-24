@extends('layouts.app')

@section('content')
<style>input:invalid {
    border-color: red;
}
input,
input:valid {
    border-color: #ccc;
}
</style>
<div class="container">
    <div class="row">
        <div class="col-md-3 ">
            <div class="list-group ">
                <a href="{{ route('actualizarInformacion') }}" class="list-group-item list-group-item-action active">Información básica</a>
                <a href="{{ route('configuracion') }}" class="list-group-item list-group-item-action">Configuración de cuenta</a>
                <a href="{{ route('experiencia') }}" class="list-group-item list-group-item-action">Experiencia</a>
                <a href="{{ route('mis-servicios') }}" class="list-group-item list-group-item-action">Mis servicios</a>


            </div> 
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Información Básica</h4>
                            <hr>
                            @if (Session::has('message'))
                                <div class="alert alert-dismissible alert-danger">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                {{Session::get('message')}}
                                </div>
                            @endif
                            @if (Session::has('status'))
                            
                            <div class='alert  alert-dismissible alert-primary'>
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                {{Session::get('status')}}
                            </div>
                           
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <form method="POST" action="{{ route('actualizarInfoPersonal') }}">
                                
                                <div class="form-group row">
                                    <label for="username" class="col-4 col-form-label">Usuario</label> 
                                    <div class="col-3">
                                        <input id="usuario" name="usuario" placeholder="{{Auth::user()->usuario}}" class="form-control here" type="text" disabled>
                                        
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="nombre" class="col-4 col-form-label">Nombre*</label> 
                                    <div class="col-8">
                                        <input id="nombre" name="nombre" class="form-control here" type="text" value="{{Auth::user()->nombre}}" required>
                                        <div class="text-danger">{{$errors->first('nombre')}}</div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="paterno" class="col-4 col-form-label">Apellido Paterno*</label> 
                                    <div class="col-8">
                                        <input id="paterno" name="paterno" class="form-control here" type="text" value="{{Auth::user()->paterno}}" required>
                                        <div class="text-danger">{{$errors->first('paterno')}}</div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="materno" class="col-4 col-form-label">Apellido Materno</label> 
                                    <div class="col-8">
                                        <input id="materno" name="materno" class="form-control here" type="text" value="{{Auth::user()->materno}}">
                                        <div class="text-danger">{{$errors->first('materno')}}</div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="telefono" class="col-4 col-form-label">Teléfono</label> 
                                    <div class="col-8">
                                        <input id="telefono" name="telefono" class="form-control here" type="number" maxlength="10" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" value="{{Auth::user()->telefono}}"> 
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="estado" class="col-4 col-form-label">Estado</label> 
                                    <div class="col-8">
                                        <select input id="estado" name="estado" class="form-control list-group dynamic" data-dependent="municipio">
                                            
                                            @if( Auth::user()->sepoID != NULL)
                                            {
                                               
                                            <option value="{{ $direc->estado }}">{{ $direc->estado }}</option>
                                            }
                                            
                                            
                                            @endif
                                            <option value="">Seleccione estado</option>
                                            @foreach ($estados as $estado)
                                            <option value="{{ $estado->estado }}">{{ $estado->estado }}</option>
                                            @endforeach


                                        </select>

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="municipio" class="col-4 col-form-label">Municipio</label> 
                                    <div class="col-8">
                                        <select input id="municipio" name="municipio" class="form-control list-group dynamic" data-dependent="asentamiento">
                                            @if( Auth::user()->sepoID != NULL)
                                            {
                                               
                                            <option value="{{ $direc->municipio }}">{{ $direc->municipio }}</option>
                                            }
                                            
                                            
                                            @endif

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="asentamiento" class="col-4 col-form-label">Asentamiento</label> 
                                    <div class="col-8">
                                        <select input id="asentamiento" name="asentamiento" class="form-control list-group dynamic">
                                           @if( Auth::user()->sepoID != NULL)
                                            {
                                               
                                            <option value="{{ $direc->asentamiento }}">{{ $direc->asentamiento }}</option>
                                            }
                            
                                            
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                    

                                {{ csrf_field() }}      
                                <input type="hidden" name="_method" value="PUT">

                                <div class="form-group row">
                                    <div class="col-7"> 
                                    <i class="text-primary">* Datos requeridos</i>
                                    <br>
                                    </div>
                                    <div class="offset-4 col-8">
                                        <button name="submit" type="submit" class="btn btn-primary">Actualizar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
 $(document).ready(function(){

    $('.dynamic').change(function(){
     if($(this).val() != '')
     {
      var select = $(this).attr("id");
      var value = $(this).val();
      var dependent = $(this).data('dependent');
      var _token = $('input[name="_token"]').val();
      $.ajax({
       url:"{{ route('actualizarInformacion.fetch') }}",
       method:"POST",
       data:{select:select, value:value, _token:_token, dependent:dependent},
       success:function(result)
       {
        $('#'+dependent).html(result);
       }

      })
     }
    });

    
     $('#estado').change(function(){
        $('#municipio').val('');
        $('#asentamiento').val('');
       });

    $('#municipio').change(function(){
     $('#asentamiento').val('');
    });
 

  });
</script>

@endsection

