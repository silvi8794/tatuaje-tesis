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
                            {{ Form::text('nombre', old('nombre',$sucursal->nombre ?? ''), array_merge(['class' => 'form-control ', 'placeholder' => 'Nombre', 'required' => true])) }}
                            @if($errors->has('nombre'))
                                <p class="text-danger">{{ $errors->first('nombre') }}</p>
                            @endif
                        </div>

                    </div>
                </div>

                <div class="col">
                    <div class="form-group">
                        <label for="title" class="col-form-label text-right colorLabel">Direccion</label>
                        <div class="col-8">
                           {{ Form::text('direccion', old('direccion', $sucursal->direccion ?? ''), array_merge(['class' => 'form-control ', 'placeholder' => 'Dirección', 'required' => true])) }}
                        @if($errors->has('direccion'))
                            <p class="text-danger">{{ $errors->first('direccion') }}</p>
                        @endif
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="title" class="col-form-label text-right colorLabel">Horario de Apertura</label>
                        <div class="col-8">
                            {{ Form::time('horario_inicio', old('horario_inicio',$sucursal->horario_inicio ?? ''), array_merge(['class' => 'form-control ', 'placeholder' => 'Horario de Apertura', 'required' => true])) }}
                            @if($errors->has('horario_inicio'))
                                <p class="text-danger">{{ $errors->first('horario_inicio') }}</p>
                            @endif
                        </div>

                    </div>
                </div>

                <div class="col">
                    <div class="form-group">
                        <label for="title" class="col-form-label text-right colorLabel">Horario de Cierre</label>
                        <div class="col-8">
                           {{ Form::time('horario_fin', old('horario_fin', $sucursal->horario_fin ?? ''), array_merge(['class' => 'form-control ', 'placeholder' => 'Horario de Cierre', 'onchange' => 'buscarhorario_fin(this.value);','required' => true])) }}
                            @if($errors->has('horario_fin'))
                                <p class="text-danger">{{ $errors->first('horario_fin') }}</p>
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
                            @if(!empty($sucursal->localidad_id))
                            <select name="selectLocalidad" id="selectLocalidad" class="form-control colorInput" onchange="buscarProvincia()" required>
                        @else
                            <select name="selectLocalidad" id="selectLocalidad" class="form-control colorInput" onchange="buscarProvincia()" required>
                        @endif

                        <option style='background-color:#ebecff' value="" selected disabled ></option>

                        @foreach( $localidades as $localidad)

                            @if(!empty($sucursal))
                                <option value="{{$localidad->id}}" {{ ($sucursal->localidad_id === $localidad->id ? 'selected' : '') ? 'selected':''}} > {{$localidad->nombre}}</option>
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
                        <label for="title" class="col-form-label text-right colorLabel">Provincia</label>
                        <div class="col-8">
                           <input type="text" id="inputProvincia" class="form-control" disabled>
                        </div>

                    </div>
                </div>
            </div>














        </div>
        <!-- /.card -->
      </div>
    </div>
  </div>




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

            if ($('#selectLocalidad').text() != "") {
                buscarProvincia();
            }


          });




  </script>
  @endsection


