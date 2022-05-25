@extends('administracion.layouts.app')

@extends('administracion.navbar.navbar')

@extends('administracion.menu.menu')

@section('content')

<div class="content-wrapper">
    <!-- right column -->
    <div class="col-md-12">
        <div class="row col-12 mt-1 mb-3">
            <h3 class="titleModule">Crear Sucursal</h3>
        </div>
        {!! Form::open(['route' => 'sucursal.store', 'enctype' => 'multipart/form-data']) !!}
            @include('administracion.sucursal.partials.forms')
            <section class="main-header navbar navbar-expand" style="position: fixed; left: 0; right: 0; bottom: 0px; z-index: 1; background-color: white; height:60px;">
                <div class="container-fluid">
                    <div class="col-6 mt-4"></div>
                        <div class="col-6" style="text-align:right;">
                            <button type="submit" value="save" name="save" class="btn btn-info separateBto">Guardar</button>
                            <button type="submit" value="saveAdd" name="saveAdd" class="btn btn-success separateBto">Guardar y agregar</button>
                            {!! link_to_route('sucursal.index', $title = 'Cancelar', $parameters = [], $attributes = ['class' => 'btn btn-secondary separateBto']); !!}
                        </div>
                    </div><!-- /.container-fluid -->
            </section>
         {!! Form::close() !!}



    </div>
    <!--/.col (right) -->
</div>



@endsection

@section('scripts')

@endsection
