@extends('layouts.pub')

@section('content')
<link rel="stylesheet" href="{{ asset('css/tagsinput.css') }}">

<div class="container">
    <div class="row">

        <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
            <h3 class="page-header text-center text-info">PUBLICAR SERVICIO</h3>
            <hr class="my-4">

            <form action="{{ route('guardar-servicio') }}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="titulo"><h5>* Titulo</h5></label>
                    <input type="text" name="titulo" id="titulo" class="form-control" placeholder="Debe ser corto pero descriptivo">
                </div>
                <br>

                <div class="form-group">
                    <label for="categoriaServ"><h5>* Categoría</h5></label> 
                        <div>
                            <select input id="categoriaServ" name="categoriaServ" class="form-group form-control nice-select open">
                                  
                                            <option value="">Seleccione categoría</option>
                                       
                                            @foreach ($categorias as $categoria)
                                            <option value="{{ $categoria->categoriaID }}">{{ $categoria->descripcion }}</option>
                                            @endforeach
                            </select>
                        </div>
                </div>
                <br>


                <div class="form-group">
                    <label for="descripcion"><h5>* Descripción</h5></label>
                    <textarea type="text" name="descripcion" id="descripcion" class="form-control" rows="7"></textarea>
                    <p class=" form-control text-info"><span class="lnr lnr-bubble"><strong>La descripción del servicio debe ser detallada, y por lo menos debe tener 500 carácteres.</strong></span></p>
                </div>
                <br>

                <div class="form-group">
                    <label for="incluye"><h5>¿Qué incluye tu servicio?</h5></label>
                    <textarea type="text" name="incluye" id="incluye" class="form-control" placeholder="Por ejemplo: Servicio a Domicilio, garantía, limpieza, etc." rows="2"></textarea>
                </div>
                <br>

                <div class="form-group">
                    <label for="no_incluye"><h5>¿Qué <b>no</b> incluye tu servicio?</h5></label>
                    <textarea type="text" name="no_incluye" id="no_incluye" class="form-control" rows="2" placeholder="Por ejemplo: Cobros con tarjeta de crédito, material adicional, etc."></textarea>
                </div>
                <br>

                <div class="form-group field_wrapper">
                    <label><h5>Precios generales (máximo 10)</h5></label>
                    <div class="row">
                        <div class="col-3">
                            <div class="input-group">
                                <input placeholder="Precio" type="number" name="precio[]" class="form-control" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group">
                             <input type="text" placeholder="Descripcion" name="criterio[]" class="form-control" />
                            </div>
                        </div>

                        <div class="col-2">
                            <div class="input-group">
                             <a href="javascript:void(0);" class="add_button btn btn-info" title="Agregar">
                                Agregar otro</a>  
                            </div>
                        </div>
                        
                    </div>
                </div>
                <br>


                <div class="form-group">
                    <label><h5>Contacto</h5></label>
                    <div class="row">
                        
                        <div class="col-4">
                            <label for="tel_contacto">*Telefono de contacto</label>
                            <div class="input-group">
                                <input type="number" name="tel_contacto" maxlength="10" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="form-control" required />
                            </div>
                        </div>
                        
                        <div class="col-5">
                            <label for="tel_wsp">Whatsapp</label>
                            <div class="input-group">
                             <input type="number" name="tel_wsp" maxlength="10" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="form-control" />
                            </div>
                        </div>
                        
                    </div>
                </div>
                <br>

                
                <div class="form-group">
                    <label for="tags"><h5>* Etiquetas (separadas por coma)</h5></label>
                    <input type="text" name="tags" data-role="tagsinput" id="tags" class="bootstrap-tagsinput form-control">
                </div>
                <br>


                <div class="form-group">
                    <label for="image"><h5>*Imagen alusiva</h5></label>
                    <div class="input-group mb-3">

                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="image">
                        <label class="custom-file-label " for="image">Seleccionar imagen</label>
                      </div>
                    </div>
                  </div>
                  <br>

                
                
                <div class="form-group">
                    <p class="text-danger">* Datos obligatorios</p>

                    <div class="col-md-6 offset-md-7">
                                <a class="btn btn-danger btn-lg" href="/inicio">
                                    {{ __('Cancelar') }}
                                </a>
                                <input type="submit" class="btn btn-success btn-lg" value="Publicar">
                            </div>
                </div>
                
                
                
            </form>
        </div>
        
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card border-primary mb-3" style="max-width: 20rem;">
          
          
            <div class="card-header"><h4 class="card-title text-center">Recomendaciones</h4></div>
            <div class="card-body">
            <div class="row">
                <div ><img src="img/info-pub/titulo.svg" align="center"></div>
                <div class="col"><p class="card-text">Con un <b>título</b> claro y descriptivo conseguirás más atención</p></div>
            </div>
            <br>

            <div class="row">
                <div ><img src="img/info-pub/tags.svg" align="center"></div>
                <div class="col"><p class="card-text">Usa etiquetas: Agrega <strong>etiquetas</strong> o <b>tags</b> a tus artículos para darles mayor visibilidad y que aparezcan cuando otros usuarios lo busquen.</p></div>
            </div>
            <br>

            <div class="row">
                <div ><img src="img/info-pub/formato.svg" align="center"></div>
                <div class="col"><p class="card-text">Combina formatos: una publicación de servicio es más atractiva y visible si combinas distintos elementos. Utiliza <b>textos, imágenes o enlaces</b> para que tu artículo sea más llamativo.</p></div>
            </div>
          </div>
        </div>

    </div>
</div>
   
</div>



<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});

</script>
<script src="{{ asset('js/tagsinput.js') }}"></script>  

<script type="text/javascript">
$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div class="row" id="eliminar"><div class="col-3"><div class="input-group"><input placeholder="Precio" type="number" name="precio[]" class="form-control" /></div></div><div class="col-6"><div class="input-group"><input type="text" placeholder="Descripcion" name="criterio[]" class="form-control" /></div></div><div class="col-2"><div class="input-group"><a href="javascript:void(0);" class="remove_button btn btn-danger" title="Remove field">Eliminar</a></div></div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    $(addButton).click(function(){ //Once add button is clicked
        if(x < maxField){ //Check maximum number of input fields
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); // Add field html
        }
    });
    $(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
        e.preventDefault();
        document.getElementById("eliminar").remove(); //Remove field html
        x--; //Decrement field counter
    });
});
</script>  



@endsection
   
