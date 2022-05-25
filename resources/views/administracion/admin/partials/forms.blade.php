<div class="row">

    <div class="col-12">
      <div class="card card-primary card-outline card-outline-tabs">
        <div class="card-header p-0 border-bottom-0">

        </div>
        <div class="card-body">

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="title" class="col-form-label text-right colorLabel">Nombre</label>
                        <div class="col-8">
                            {{ Form::text('nombre', old('nombre',$user->nombre ?? ''), array_merge(['class' => 'form-control ', 'placeholder' => 'Nombre', 'id'=>'nombre', 'maxlength'=>'30', 'size' => '30','required' => true])) }}
                            @if($errors->has('nombre'))
                                <p class="text-danger">{{ $errors->first('nombre') }}</p>
                            @endif
                        </div>

                    </div>
                </div>

                <div class="col">
                    <div class="form-group">
                        <label for="title" class="col-form-label text-right colorLabel">Apellido</label>
                        <div class="col-8">
                           {{ Form::text('apellido', old('apellido', $user->apellido ?? ''), array_merge(['class' => 'form-control ', 'placeholder' => 'Apellido', 'id'=>'apellido', 'maxlength'=>'30', 'size' => '30', 'required' => true])) }}
                        @if($errors->has('apellido'))
                            <p class="text-danger">{{ $errors->first('apellido') }}</p>
                        @endif
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="title" class="col-form-label text-right colorLabel">D.N.I</label>
                        <div class="col-8">
                            @if(!empty($user->dni))
                            <input type="text" class="form-control" value="{{ $user->dni }}" disabled>
                        @else
                            {{ Form::text('dni', old('dni',$user->dni ?? ''), array_merge(['class' => 'form-control ', 'placeholder' => 'DNI', 'id'=>'dni', 'maxlength'=>'8', 'size' => '8','required' => true])) }}
                            @if($errors->has('dni'))
                                <p class="text-danger">{{ $errors->first('dni') }}</p>
                            @endif
                        @endif
                        </div>

                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="title" class="col-form-label text-right colorLabel">Email</label>
                        <div class="col-8">
                            @if(!empty($user->email))
                            <input type="text" class="form-control" value="{{ $user->email }}" disabled>
                        @else
                            {{ Form::text('email', old('email', $user->email ?? ''), array_merge(['class' => 'form-control ', 'placeholder' => 'Email', 'onchange' => 'buscarEmail(this.value);','required' => true])) }}
                            @if($errors->has('email'))
                                <p class="text-danger">{{ $errors->first('email') }}</p>
                            @endif
                            <span class="buscarEmailAlert"></span>
                        @endif
                        </div>

                    </div>
                </div>

            </div>



            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="title" class="col-form-label text-right colorLabel">Localidad</label>
                        <div class="col-8">
                           @if(!empty($user->localidad_id))
                            <select name="selectLocalidad" id="selectLocalidad" class="form-control colorInput" onchange="buscarProvincia()" required>
                            @else
                            <select name="selectLocalidad" id="selectLocalidad" class="form-control colorInput" onchange="buscarProvincia()" required>
                            @endif

                        <option style='background-color:#ebecff' value="" selected disabled ></option>
                        @foreach( $localidades as $localidad)

                            @if(!empty($user))
                                <option value="{{$localidad->id}}" {{ ($user->localidad_id === $localidad->id ? 'selected' : '') ? 'selected':''}} > {{$localidad->nombre}} - {{$localidad->provincia->nombre}}</option>
                            @else
                                <option {{ old('selectLocalidad') == $localidad->id ? 'selected' : ''}} value="{{$localidad->id}}"  > {{$localidad->nombre}} - {{$localidad->provincia->nombre}}</option>
                            @endif
                        @endforeach
                    </select>
                    @if($errors->has('selectLocalidad'))
                        <p class="text-danger">{{ $errors->first('selectLocalidad') }}</p>
                    @endif
                        </div>

                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="title" class="col-form-label text-right colorLabel">Sexo</label>
                        <div class="col-8">
                            @if(!empty($user->sexo_id))
                            <select name="selectSexo" id="selectSexo" class="form-control colorInput" required>
                            @else
                            <select name="selectSexo" id="selectSexo" class="form-control colorInput" required>
                            @endif

                            <option style='background-color:#ebecff' value="" selected disabled ></option>
                            @foreach( $sexos as $sexo)

                                @if(!empty($user))
                                    <option value="{{$sexo->id}}" {{ ($user->sexo_id === $sexo->id ? 'selected' : '') ? 'selected':''}} > {{$sexo->nombre}}</option>
                                @else
                                    <option {{ old('selectSexo') == $sexo->id ? 'selected' : ''}} value="{{$sexo->id}}"> {{$sexo->nombre}}</option>
                                @endif
                            @endforeach
                        </select>
                        @if($errors->has('selectSexo'))
                            <p class="text-danger">{{ $errors->first('selectSexo') }}</p>
                        @endif

                        </div>

                    </div>
                </div>

            </div>

             <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="title" class="col-form-label text-right colorLabel">Provincia</label>
                        <div class="col-4">
                            <input type="text" id="inputProvincia" class="form-control" disabled>
                        </div>

                    </div>
                </div>

            </div>

             <div class="row">
                @if(!isset($user))
                    <div class="col">
                        <div class="form-group">
                            <label for="title" class="col-form-label text-right colorLabel">Contraseña</label>
                            <div class="col-8">
                                {!! Form::password('password', ['class' => 'form-control awesome colorInput', 'placeholder' => 'Password', 'size' => 10, 'maxlength' => 10, 'required' => true, 'id'=>'myPassword']) !!}
                                @if($errors->has('password'))
                                    <p class="text-danger">{{ $errors->first('password') }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
                @if(!isset($user))
                        <div class="col">
                            <div class="form-group">
                            <label for="title" class="col-form-label text-right colorLabel">Confirmar Contraseña</label>
                                <div class="col-8">
                                        {!! Form::password('password_confirmation', ['class' => 'form-control awesome colorInput', 'placeholder' => 'Confirm Password', 'size' => 10, 'maxlength'=> 10, 'required' => true, 'id'=>'myPassword']) !!}
                                        @if($errors->has('password_confirmation'))
                                            <p class="text-danger">{{ $errors->first('password_confirmation') }}</p>
                                        @endif

                                </div>
                            </div>
                        </div>
                    @endif

            </div>

        </div>
        <!-- /.card -->
      </div>
    </div>
  </div>




  @section('scripts')
  <script>
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


        });

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



        function buscarEmail(email){
            $.ajax({
                type: "POST",
                dataType: "json",
                url: '/users/buscar/email',
                data: {
                    email,
                    '_token':"{{ csrf_token() }}"
                    },
                success: function(data){
                    if(data.status === 200){
                        $('.buscarEmailAlert').removeClass('text-danger').addClass('text-success').css({'display':'grid'}).text('Email Valido');
                    }else{
                        $('.buscarEmailAlert').removeClass('text-success').addClass('text-danger').css({'display':'grid'}).text('El Email ya existe');
                    }
                }
            });
        }


  </script>
  @endsection


