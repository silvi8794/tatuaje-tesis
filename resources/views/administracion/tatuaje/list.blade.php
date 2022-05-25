@extends('administracion.layouts.app')

@extends('administracion.navbar.navbar')

@extends('administracion.menu.menu')

@section('content')



<div class="content-wrapper">
   <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="row mb-4">
                <div class="card-header">
                    <h3 class="card-title titleModule">Listado de Tatuajes </h3>
                </div>
                
                <div class="col-lg-9">
                        <a href="{{ route('tatuaje.create') }}" class="btn btn-info float-right" role="button" style=" border-bottom: 10px solid #ffffff margin-left: 5px; margin-top: 15px; margin-bottom: 5px; margin-right: 5px ">Crear Tatuaje</a>
                </div>
                </div>


                <!-- /.card-header -->
                <div class="card-body">
                    <!-- <div class="col-4">
                        <a href="{{ route('tatuaje.create') }}" class="btn btn-info" role="button" >Crear Tatuaje</a>
                    </div> -->

                    <table id="listadoUsuario" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width:10%; text-align:left"></th>
                                <th style="width:40%; text-align:left">Nombre</th>
                                <th style="width:30%; text-align:left">Fuente</th>
                                <th style="width:10%; text-align:left">Tamaño</th>
                                <th style="text-align:center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tatuajes as $tatuaje)
                               <tr>
                                    <td style=" text-align:center">
                                        @if($tatuaje->imagen)
                                            <img src="{{ url($tatuaje->imagen) }}" class="elevation-2 userImage" alt="Imagen" >
                                        @else
                                            <img src="{{ asset('/dist/img/user2-160x160.jpg') }}"  class="elevation-2 userImage" alt="Imagen">
                                        @endif
                                    </td>
                                    <td style=" text-align:left">
                                        @if(!empty($tatuaje->nombre))
                                            {{ $tatuaje->nombre }}
                                        @endif
                                    </td>

                                    <td style=" text-align:left">
                                        @if(!empty($tatuaje->fuente))
                                            {{ $tatuaje->fuente }}
                                        @endif
                                    </td>
                                    <td style=" text-align:left">
                                        @if(!empty($tatuaje->tamaño))
                                            {{ $tatuaje->tamaño }}
                                        @endif
                                    </td>


                                    <td>
                                        <div class="d-flex justify-content-center">

                                            <button type="button" class="btn paddBto" data-user="{{$tatuaje}}" data-toggle="modal" data-target="#showTatuaje{{ $tatuaje->id }}">
                                                <i class="fas fa-search"></i>
                                            </button>
                                            <form action="{{$tatuaje->id}}/edit" method="GET">
                                                <button type="submit" class="btn">
                                                        <i class="far fa-edit"></i>
                                                </button>
                                            </form>
                                                {!! Form::open(['route' => 'tatuaje.delete','id'=>'formDelete', 'name'=>'formDelete']) !!}
                                                    @method('DELETE')
                                                   {{--  {{ Form::hidden('id', $tatuaje->id) }} --}}
                                                    <input type="hidden" name="id" id="idTatuaje">
                                                    <button type="button" class="btn" onclick="borrarTatuaje({{ $tatuaje->id }})">
                                                            <i class="far fa-trash-alt" style="color:red;"></i>
                                                        </button>
                                                {!! Form::close() !!}

                                        </div>
                                    </td>
                                </tr>
                                @include('administracion/tatuaje/partials/actions')

                            @endforeach
                        </tbody>
                        <tfoot>
                        </tfoot>
                    </table>
                    
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>





@endsection

@section('scripts')

    <script>
    $(document).ready(function($) {
        $('#listadoUsuario').DataTable({
            language: {
                url: '../js/es-ar.json' //Ubicacion del archivo con el json del idioma.
            }
        });
    });
    function borrarTatuaje(idTatuaje){
        Swal.fire({
            title: '<strong style="color:red;">¿Está seguro de eliminar el Tatuaje?</strong>',
            icon: 'danger',
            showCloseButton: true,
            showCancelButton: true,
            focusConfirm: false,
            confirmButtonText:'Aceptar',
            cancelButtonText:'Cancelar',
            }).then((result) => {
            if (result.isConfirmed) {
                $('#idTatuaje').val(idTatuaje);
                $( "#formDelete" ).submit();
            }
            })
    }

    </script>
@endsection
