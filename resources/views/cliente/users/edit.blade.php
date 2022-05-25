@extends('cliente.layouts.app_client')
@extends('cliente.navbar.navbar')



@section('content')

<section class="hero-wrap js-fullheight mb-5">
    <div id="contacto">

        <section class="ftco-section contact-section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-12 mb-12 text-center">
                        <h2 class="h5 font-weight-bold">PERFIL</h2>
                    </div>
                </div>
                <div class="row block-12">
                          <div class="col-md-4 text-md-right contact-info ftco-animate"></div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-12 ftco-animate">

                <form action="{{ $user->id }}/updateuser" class="contact-form" method="POST">
                        <input name="_method" type="hidden" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">


                        <div class="row mb-5 mt-5">
                            <div class="col-2 offset"></div>
                            <div class="form-group">
                                <div class="col-1">
                                    NOMBRE
                                </div>
                                <div class="col-2">
                                    <input type="text" name="nombre" maxlength="30" id="nombre" size="30" value="{{ $user->nombre }}">
                                </div>

                            </div>

                            <div class="col-1 offset"></div>
                            <div class="form-group">
                                <div class="col-1">
                                    APELLIDO
                                </div>
                                <div class="col-2">
                                  <input type="text" name="apellido" maxlength="40" id="apellido" size="40" value="{{ $user->apellido }}">
                                </div>

                            </div>

                        </div>

                        <div class="row mb-5 mt-5">
                            <div class="col-2 offset"></div>
                            <div class="form-group">
                                <div class="col-1">
                                    DNI
                                </div>
                                <div class="col-2">
                                    <input type="text" name="dni" id="dni" size="30" value="{{ $user->dni }}" disabled>
                                </div>

                        </div>

                        <div class="col-1 offset"></div>
                            <div class="form-group">
                                <div class="col-1">
                                   CORREO
                                </div>
                                <div class="col-2">
                                    <input type="text" name="email" size="40" value="{{ $user->email }}" disabled>
                                </div>

                            </div>

                        </div>

                        <div class="row mb-5 mt-5">
                            <div class="col-2 offset"></div>
                            <div class="form-group">
                                <div class="col-1">
                                    LOCALIDAD
                                </div>

                                <div class="col-2">

                                @if(!empty($user->localidad_id))
                                    <select name="selectLocalidad" id="selectLocalidad" class="col-form-label text-left colorLabel" onchange="buscarProvincia()" required>
                                @else
                                    <select name="selectLocalidad" id="selectLocalidad"class="col-form-label text-left colorLabel" onchange="buscarProvincia()" required>
                                @endif

                                    <option value="" disabled></option>
                                    @foreach( $localidades as $localidad)

                                        @if(!empty($user))
                                            <option value="{{$localidad->id}}" {{ ($user->localidad_id === $localidad->id ? 'selected' : '') ? 'selected':''}} > {{$localidad->nombre}}</option>
                                        @else
                                            <option {{ old('selectLocalidad') == $localidad->id ? 'selected' : ''}} value="{{$localidad->id}}"  > {{$localidad->nombre}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                </select>
                                    @if($errors->has('selectLocalidad'))
                                        <p class="text-danger">{{ $errors->first('selectLocalidad') }}</p>
                                    @endif

                                </div>

                            </div>

                            <div class="col-2 offset"></div>
                            <div class="form-group">
                                <div class="col-1 ml-4">
                                    SEXO
                                </div>

                                <div class="col-2 ml-4">
                                    @if(!empty($user->sexo_id))
                                        <select name="selectSexo" id="selectSexo" class="col-form-label text-right colorLabel" required>
                                    @else
                                        <select name="selectSexo" id="selectSexo" class="col-form-label text-right colorLabel" required>
                                    @endif

                                    <option value="" disabled></option>
                                    @foreach( $sexos as $sexo)

                                        @if(!empty($user))
                                            <option value="{{$sexo->id}}" {{ ($user->sexo_id === $sexo->id ? 'selected' : '') ? 'selected':''}} > {{$sexo->nombre}}</option>
                                        @else
                                            <option {{ old('selectSexo') == $sexo->id ? 'selected' : ''}} value="{{$sexo->id}}" > {{$sexo->nombre}}</option>
                                        @endif
                                    @endforeach
                                    </select></select>
                                    @if($errors->has('selectSexo'))
                                        <p class="text-danger">{{ $errors->first('selectSexo') }}</p>
                                    @endif

                                </div>

                            </div>

                        </div>

                     <div class="row mb-5 mt-5">

                        <div class="col-2 offset"></div>
                            <div class="form-group">
                                <div class="col-8">
                                    PROVINCIA
                                </div>
                                <div class="col-1">
                                 <input type="text" id="inputProvincia" size="30" disabled>
                                </div>

                            </div>

                        </div>


                    <div class="row">
                        <div class="col-2 offset"></div>
                        <div class="col-8">
                            <div class="form-group">
                                <input type="submit" value="Actualizar" class="btn btn-primary py-3 px-5">
                              </div>
                        </div>
                    </div>


                  </form>
                </div>
              </div>
            </div>





            <!-- Modal -->
            <div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                <form class="form-horizontal" method="POST" action="addEvent.php">

                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Seleccionar Turno</h4>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="idTatuador" id="idTatuador">
                        <input type="hidden" name="idImagen" id="idImagen">

                        <p>
                            <span>Tatuador Seleccionado: <span class="tatuadorSelecionado"></span></span>
                        </p>
                        <p class="alert-danger hiddenAlertTatuador">Debe seleccionar un Tatuador</p>
                        <p>
                            <span>Tatuaje Seleccionado
                                <img src="" alt="" class="tatuajeSeleccionado hiddenTatuajeSeleccionado" width="200" height="200">
                            </span>
                        </p>
                        <p class="alert-danger hiddenAlertTatuaje">Debe seleccionar un Tatuaje</p>
                        <div class="form-group">
                            <div class="col-sm-10">
                                <span>Fecha</span>
                                <input type="text" name="fechaActual" id="fechaActual" disabled>
                                <input type="hidden" name="argStart" id="argStart">
                                <input type="hidden" name="dateFormat" id="dateFormat">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10">
                                <select name="turno" class="form-control" id="turno" onchange="seleccionarTurno()">
{{--                                     <option style="background-color:black" value="" selected>Seleccionar</option> --}}
{{--                                     <option style="background-color:black" value="08:00:00" >08:00 - 10:00</option>
                                    <option style="background-color:black" value="10:00:00" >10:00 - 12:00</option>
                                    <option style="background-color:black" value="16:00:00" >16:00 - 18:00</option>
                                    <option style="background-color:black" value="18:00:00" >18:00 - 20:00</option> --}}
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btoSave" onclick="guardarTurno()" disabled>Agendar Turno</button>
                    </div>
                </form>
                </div>
                </div>

              </div>
              <div id="viewRender">

            </div>


    </section>



@endsection

@section('scripts')

<script>
    function buscarProvincia(){
        let idLocalidad = $('#selectLocalidad').val();
        if(idLocalidad != ''){
            $.ajax({
                type: "POST",
                dataType: "json",
                url: '/users/buscar/provincia',
                data: {
                    idLocalidad,
                    '_token':"{{ csrf_token() }}"
                    },
                success: function(data){
                    if(data.status === 200){
                        $('#inputProvincia').val(data.provincia);
                    }else{
                        $('#inputProvincia').empty();
                    }
                }
            });
        }else{
        $('#inputProvincia').empty();
        }
    }

    $(document).ready(function($) {
        $('#dni').mask('00000000');
            $('#nombre').mask('AAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', {'translation': {
                    A: {pattern: /[A-Za-z\s]/},
                }
            });
            $('#apellido').mask('AAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', {'translation': {
                    A: {pattern: /[A-Za-z\s]/},
                }
            });

            if ($('#selectLocalidad').text() != "") {
                buscarProvincia();
            }

        if ($('#selectLocalidad').text() != "") {
            buscarProvincia();
        }


    });
</script>
@endsection
