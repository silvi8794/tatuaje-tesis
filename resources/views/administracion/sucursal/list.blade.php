@extends('administracion.layouts.app')

@extends('administracion.navbar.navbar')

@extends('administracion.menu.menu')

@section('content')






<div class="content-wrapper">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title titleModule">Listado de Sucursales</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="col-2">
                        <a href="{{ route('sucursal.create') }}" class="btn btn-info" role="button" >Crear Sucursal</a>
                    </div>

                    <table id="listadoSucursal" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width:25%; text-align:center">Nombre</th>
                                <th style="width:25%; text-align:center">Dirección</th>
                                <th style="width:20%; text-align:center">Horario</th>
                                <th style="width:20%; text-align:center">Localidad</th>
                                <th style="text-align:center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sucursales as $sucursal)
                               <tr>
                                    <td style=" text-align:center">
                                        @if(!empty($sucursal->nombre))
                                            {{ $sucursal->nombre }}
                                        @endif
                                    </td>
                                    <td style=" text-align:center">
                                        @if(!empty($sucursal->direccion))
                                            {{ $sucursal->direccion }}
                                        @endif
                                    </td>
                                    <td style=" text-align:center">
                                        @if(!empty($sucursal->horario_inicio))
                                            {{ $sucursal->horario_inicio }} - {{ $sucursal->horario_fin }}
                                        @endif
                                    </td>

                                    <td style=" text-align:center">
                                        @if(!empty($sucursal->localidad))
                                            {{ $sucursal->localidad->nombre }}
                                        @endif
                                    </td>

                                    <td>
                                        <div class="d-flex justify-content-center">

                                            <button type="button" class="btn paddBto" data-user="{{$sucursal}}" data-toggle="modal" data-target="#showSucursal{{ $sucursal->id }}">
                                                <i class="fas fa-search"></i>
                                            </button>
                                            <form action="{{$sucursal->id}}/edit" method="GET">
                                                <button type="submit" class="btn">
                                                        <i class="far fa-edit"></i>
                                                </button>
                                            </form>
                                                {!! Form::open(['route' => 'sucursal.delete','id'=>'formDelete', 'name'=>'formDelete']) !!}
                                                    @method('DELETE')
                                                    {{-- {{ Form::hidden('id',) }} --}}
                                                    <input type="hidden" name="id" id="idSucursal">
                                                    <button type="button" class="btn" onclick="borrarSucursal({{ $sucursal->id }})">
                                                            <i class="far fa-trash-alt" style="color:red;"></i>
                                                        </button>
                                                {!! Form::close() !!}

                                        </div>
                                    </td>
                                </tr>
                                @include('administracion/sucursal/partials/actions')

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
        $('#listadoSucursal').DataTable({
            language: {
                url: '../js/es-ar.json' //Ubicacion del archivo con el json del idioma.
            }
        });
    });

    function borrarSucursal(idSucursal){
        Swal.fire({
            title: '<strong style="color:red;">¿Está seguro de eliminar la Sucursal?</strong>',
            icon: 'danger',
            showCloseButton: true,
            showCancelButton: true,
            focusConfirm: false,
            confirmButtonText:'Aceptar',
            cancelButtonText:'Cancelar',
            }).then((result) => {
            if (result.isConfirmed) {
                $('#idSucursal').val(idSucursal);
                $( "#formDelete" ).submit();
            }
            })
    }

    </script>
@endsection
