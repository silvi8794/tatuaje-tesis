@extends('administracion.layouts.app')

@extends('administracion.navbar.navbar')

@extends('administracion.menu.menu')

@section('content')






<div class="content-wrapper">

    <!-- <section class="main-header navbar navbar-expand" style="position: fixed; left: 0; right: 0; top: 57px; z-index: 1; background-color: white; height:60px;"> -->
        
    <!-- </section> -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="row mb-4">
                    <div class="card-header">
                        <h3 class="card-title titleModule">Listado de Lugares</h3>
                    </div>
                    
                       
                            <div class="col-lg-9">
                                    <a href="{{ route('lugar.create') }}" class="btn btn-info float-right" role="button" style=" border-bottom: 10px solid #ffffff margin-left: 5px; margin-top: 15px; margin-bottom: 5px; margin-right: 5px ">Crear Lugar</a>
                            </div>
                        
                    
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    <table id="listadoLugar" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width:90%; text-align:left">Nombre</th>
                                <th style="text-align:center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lugares as $lugar)
                               <tr>
                                    <td style=" text-align:left">
                                        @if(!empty($lugar->nombre))
                                            {{ $lugar->nombre }}
                                        @endif
                                    </td>

                                    <td>
                                        <div class="d-flex justify-content-center">

                                            <button type="button" class="btn paddBto" data-user="{{$lugar}}" data-toggle="modal" data-target="#showLugar{{ $lugar->id }}">
                                                <i class="fas fa-search"></i>
                                            </button>
                                            <form action="{{$lugar->id}}/edit" method="GET">
                                                <button type="submit" class="btn">
                                                        <i class="far fa-edit"></i>
                                                </button>
                                            </form>
                                                {!! Form::open(['route' => 'lugar.delete','id'=>'formDelete', 'name'=>'formDelete']) !!}
                                                    @method('DELETE')
{{--                                                     {{ Form::hidden('id', $lugar->id) }} --}}
                                                    <input type="hidden" name="id" id="idLugar">
                                                    <button type="button" class="btn" onclick="borrarLugar({{ $lugar->id }})">
                                                            <i class="far fa-trash-alt" style="color:red;"></i>
                                                        </button>
                                                {!! Form::close() !!}

                                        </div>
                                    </td>
                                </tr>
                                @include('administracion/lugar/partials/actions')

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
        $('#listadoLugar').DataTable({
            language: {
                url: '../js/es-ar.json' //Ubicacion del archivo con el json del idioma.
            }
        });
    });

    function borrarLugar(idLugar){
        Swal.fire({
            title: '<h3 style="font-weight: bold!important; color: red;">¿Está seguro de eliminar el Lugar?</h3>',
            icon: 'danger',
            showCloseButton: true,
            showCancelButton: true,
            focusConfirm: false,
            confirmButtonText:'Aceptar',
            cancelButtonText:'Cancelar',
            }).then((result) => {
            if (result.isConfirmed) {
                $('#idLugar').val(idLugar);
                $( "#formDelete" ).submit();
            }
            })
    }

    </script>
@endsection
