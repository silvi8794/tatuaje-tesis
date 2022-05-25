<div class="row">

    <div class="col-12">
      <div class="card card-primary card-outline card-outline-tabs">
        <div class="card-header p-0 border-bottom-0">

        </div>
        <div class="card-body">


            <div class="row" >
                <div class="col-2 mb-4 mt-2" style="text-align: right;">
                    @if(empty($tatuaje))
                        <img src="{{ asset('dist/img/logo-tattoo.jpg') }}"  class="img-circle elevation-2" alt="User Image" style="width:80px; height:80px" id="img-circle-avatar">
                    @else
                        @if(!empty($tatuaje->imagen))
                            <img src="{{url($tatuaje->imagen)}}" class="img-circle elevation-2" alt="User Image" style="width:80px; height:80px" id="img-circle-avatar">
                        @else
                            <img src="{{ asset('dist/img/logo-tattoo.jpg') }}"  class="img-circle elevation-2" alt="User Image" style="width:80px; height:80px" id="img-circle-avatar">
                        @endif
                    @endif
                </div>
                    <div class="col-4" style="text-align: left; margin-top: 3%;">
                    <input type="file" name="image" class="form-control colorInput" accept=".png, .jpg, .jpeg" id="avatar" required>
                    @if($errors->has('image'))
                    <p class="text-danger">{{ $errors->first('image') }}</p>
                            @endif
                </div>





            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="title" class="col-form-label text-right colorLabel">Fuente</label>
                        <div class="col-8">
                             {{ Form::text('fuente', old('fuente',$tatuaje->fuente ?? ''), array_merge(['class' => 'form-control ', 'placeholder' => 'Fuente', 'maxlength' => '30', 'size' => '30', 'required' => true])) }}
                            @if($errors->has('fuente'))
                                <p class="text-danger">{{ $errors->first('fuente') }}</p>
                            @endif
                        </div>

                    </div>
                </div>

                <div class="col">
                    <div class="form-group">
                        <label for="title" class="col-form-label text-right colorLabel">Tamaño</label>
                        <div class="col-8">
                            {{ Form::text('tamaño', old('tamaño',$tatuaje->tamaño ?? ''), array_merge(['class' => 'form-control ', 'placeholder' => 'Tamaño', 'maxlength' => '10', 'size' => '10', 'required' => true])) }}
                        @if($errors->has('tamaño'))
                            <p class="text-danger">{{ $errors->first('tamaño') }}</p>
                        @endif

                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="title" class="col-form-label text-right colorLabel">Nombre</label>
                        <div class="col-8">
                            {{ Form::text('nombre', old('nombre',$tatuaje->nombre ?? ''), array_merge(['class' => 'form-control ', 'placeholder' => 'Nombre', 'maxlength' => '50', 'size' => '50', 'required' => true])) }}
                            @if($errors->has('nombre'))
                                <p class="text-danger">{{ $errors->first('nombre') }}</p>
                            @endif
                        </div>

                    </div>
                </div>

                <div class="col">
                    <div class="form-group">
                        <label for="title" class="col-form-label text-right colorLabel">Categoria</label>
                        <div class="col-8">
                           <div class="select2-blue">
                            <select name="selectCategoria[]" id="selectCat" class="select2 form-control colorInput"  multiple="multiple" data-placeholder="Categoria" data-dropdown-css-class="select2">
                                @foreach( $categorias as $categoria)

                                    @if(!empty($tatuaje->categorias))
                                        <option value="{{$categoria->id}}" @if($tatuaje->categorias->containsStrict('id', $categoria->id)) selected="selected" @endif>{{$categoria->nombre}}</option>
                                    @else
                                        <option value="{{$categoria->id}}" >{{$categoria->nombre}}</option>
                                    @endif

                               @endforeach
                           </select>
                            @if($errors->has('selectCategoria'))
                                <p class="text-danger">{{ $errors->first('selectCategoria') }}</p>
                            @endif
                            </div>

                        </div>

                    </div>
                </div>
            </div>





            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="title" class="col-form-label text-right colorLabel">Sexo</label>
                        <div class="col-8">
                            <div class="select2-blue">
                            <select name="selectSexo[]" id="selectSexo" class="select2 form-control colorInput"  multiple="multiple" data-placeholder="Sexo" data-dropdown-css-class="select2">
                                @foreach($sexos as $sexo)

                                    @if(!empty($tatuaje->sexos))
                                        <option value="{{$sexo->id}}" @if($tatuaje->sexos->containsStrict('id', $sexo->id)) selected="selected" @endif>{{$sexo->nombre}}</option>
                                    @else
                                        <option value="{{$sexo->id}}" >{{$sexo->nombre}}</option>
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

                <div class="col">
                    <div class="form-group">
                        <label for="title" class="col-form-label text-right colorLabel">Lugares</label>
                        <div class="col-8">
                          <div class="select2-blue">
                            <select name="selectLugar[]" id="selectLugar" class="select2 form-control colorInput"  multiple="multiple" data-placeholder="Lugares" data-dropdown-css-class="select2">
                                @foreach( $lugares as $lugar)

                                    @if(!empty($tatuaje->lugares))
                                        <option value="{{$lugar->id}}" @if($tatuaje->lugares->containsStrict('id', $lugar->id)) selected="selected" @endif>{{$lugar->nombre}}</option>
                                    @else
                                        <option value="{{$lugar->id}}" >{{$lugar->nombre}}</option>
                                    @endif

                               @endforeach
                           </select>
                           @if($errors->has('selectLugar'))
                                <p class="text-danger">{{ $errors->first('selectLugar') }}</p>
                            @endif
                            </div>
                        </div>

                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="title" class="col-form-label text-right colorLabel">Descripcion</label>
                        <div class="col-8">
                            {{ Form::text('descripcion', old('descripcion',$tatuaje->descripcion ?? ''), array_merge(['class' => 'form-control ', 'placeholder' => 'Descripcion', 'maxlength' => '50', 'size' => '50', 'required' => true])) }}
                            @if($errors->has('descripcion'))
                                <p class="text-danger">{{ $errors->first('descripcion') }}</p>
                            @endif
                        </div>

                    </div>
                </div>

                <div class="col">
                    <div class="form-group">
                        <label for="title" class="col-form-label text-right colorLabel">Precio Base</label>
                        <div class="col-8">
                           {{ Form::text('precio_base', old('precio_base',$tatuaje->precio_base ?? ''), array_merge(['class' => 'form-control ', 'placeholder' => 'Precio Base', 'maxlength' => '50', 'size' => '50', 'required' => true])) }}
                            @if($errors->has('precio_base'))
                                <p class="text-danger">{{ $errors->first('precio_base') }}</p>
                            @endif
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

$(document).ready(function($) {

//Initialize Select2 Elements
$('#selectCat').select2()
$('#selectLugar').select2()
$('#selectSexo').select2()


});


  </script>
  @endsection


