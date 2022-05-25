@extends('administracion.layouts.app')

@extends('administracion.navbar.navbar')

@extends('administracion.menu.menu')

@section('content')






<div class="content-wrapper">
{{--           @include('admin.loader.loader') --}}

          <!-- right column -->
          <div class="col-md-12">
                <!-- general form elements disabled -->
                <div class="card card-warning">
                    <div class="card-header">
                        <h2 class="card-title titleModule">Editar Usuario</h2>
                    </div>
                  <!-- /.card-header -->
                  <div class="card-body">





                    {!! Form::model($user,['route' => ['users.update', $user->id], 'method' => 'PUT','class' => 'form-horizontal', 'id' => 'userForm', 'enctype' => 'multipart/form-data']) !!}

                        @include('administracion.users.partials.forms')





                    <section class="main-header navbar navbar-expand" style="position: fixed; left: 0; right: 0; bottom: 0px; z-index: 1; background-color: white; height:60px;">
                            <div class="container-fluid">
                                  <div class="col-6 mt-4">

                                  </div>
                                  <div class="col-6" style="text-align:right;">


                                      <button type="submit" class="btn btn-warning separateBto"> Actualizar </button>
                                      {!! link_to_route('users.index', $title = 'Cancelar', $parameters = [], $attributes = ['class' => 'btn btn-secondary']); !!}

                                  </div>
                            </div><!-- /.container-fluid -->
                        </section>


                     {!! Form::close() !!}



                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
              <!-- general form elements disabled -->


            </div>
            <!--/.col (right) -->

</div>


@endsection

@section('scripts')

@endsection
