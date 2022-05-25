@extends('administracion.layouts.app')
@extends('administracion.navbar.navbar')
@extends('administracion.menu.menu')

@section('content')



<div class="content-wrapper">




  <!--   <section class="main-header navbar navbar-expand" style="position: fixed; left: 0; right: 0; top: 57px; z-index: 1; background-color: white; height:60px;"> -->
       <!--  <div class="container-fluid">

        </div> -->
        <!-- /.container-fluid -->
    <!-- </section> -->

    <div class="row">
    <!-- <div class="row rowFixed"> -->
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title titleModule">Listado de Turnos</h2>
                </div>
                <!-- /.card-header -->
                <div class="card-body">


                    <table id="listadoTatuador" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width:25%; text-align:center">Apellido y Nombre</th>
                                <th style="width:20%; text-align:center">Estado</th>
                                <th style="width:10%; text-align:center">Tatuaje</th>
                                <th style="width:10%; text-align:center">Fecha</th>
                                <th style="width:25%; text-align:center">Turno</th>
                                <th style="text-align:center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($turnos as $turno)
                               <tr id="tr{{ $turno->id }}">
                                   <td style=" text-align:left">
                                       @if(!empty($turno->cliente->nombre) && !empty($turno->cliente->apellido))
                                           {{ $turno->cliente->apellido }},{{ $turno->cliente->nombre }}
                                       @endif
                                   </td>
                                   <td style=" text-align:center">
                                      @if(!$turno->estado)
                                            <span id="turno_{{ $turno->id }}" style="color: red">No Atendido</span>
                                        @else
                                            <span style="color: green" id="turno_{{ $turno->id }}">Atendido</span>
                                      @endif
                                   </td>
                                   <td style=" text-align:center">
                                        @if($turno->tatuaje->imagen)
                                            <img src="{{ url($turno->tatuaje->imagen) }}" class="elevation-2 userImage" alt="User Image" >
                                        @else
                                            <img src="{{ asset('/dist/img/user2-160x160.jpg') }}"  class="elevation-2 userImage" alt="User Image">
                                        @endif
                                   </td>
                                   <td style=" text-align:center">
                                        @if(!empty($turno->fecha))
                                            {{ \Carbon\Carbon::parse($turno->fecha)->format('d/m/Y') }}
                                        @endif
                                    </td>
                                    <td style=" text-align:center">
                                        @if(!empty($turno->fecha))
                                            @php
                                                $date = new DateTime($turno->fecha);
                                            @endphp
                                            {{ \Carbon\Carbon::parse($turno->fecha)->isoFormat('HH:mm:ss') }} - {{ $date->modify('+120 minute')->format('H:i:s') }}
                                        @endif
                                    </td>

                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <button type="button" class="btn paddBto" data-user="{{$turno}}" data-toggle="modal" data-target="#showTurno{{ $turno->id }}">
                                                <i class="fas fa-search"></i>
                                            </button>
                                            @if(is_null($turno->deleted_at) && !$turno->estado)
                                                <button type="button" class="btn paddBto" id="btoAtender_{{$turno->id}}" data-user="{{$turno}}" data-toggle="modal" data-target="#showAtencion{{ $turno->id }}">
                                                    <i class="fas fa-check" style="color:green;"></i>
                                                </button>
                                            @endif
                                            {{-- @if(is_null($turno->deleted_at))
                                                <button type="button" class="btn paddBto" onclick="borrarTurno({{ $turnoAsignado->id }})">
                                                    <i class="far fa-trash-alt"></i>
                                                </button>
                                            @endif --}}


                                            {!! Form::open(['route' => 'turnos.delete','id'=>'formDelete', 'name'=>'formDelete']) !!}
                                                @method('DELETE')
                                                {{-- {{ Form::hidden('id',) }} --}}
                                                <input type="hidden" name="id" id="idTurno">
                                                <button type="button" class="btn" onclick="borrarTurno({{ $turno->id }})">
                                                        <i class="far fa-trash-alt" style="color:red;"></i>
                                                    </button>
                                            {!! Form::close() !!}

{{--                                             <a href="javascript:void(0)" ></a> --}}
                                        </div>
                                    </td>
                                </tr>
                                @include('administracion/tatuador/partials/actions')

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
        $('#listadoTatuador').DataTable({
            language: {
                url: '../js/es-ar.json' //Ubicacion del archivo con el json del idioma.
            }
        });
    });
   /* function atenderTurno(idTurno){
        console.log(idTurno)
        $.ajax({
                type: "POST",
                dataType: "json",
                url: '/tatuador/atender',
                data: {
                    idTurno,
                    '_token':"{{ csrf_token() }}"
                    },
                success: function(data){
                    if(data.status===200){
                        $(`#turno_${idTurno}`).css('color','green').text('Atendido');
                        $(`#btoAtender_${idTurno}`).css('display','none');
                        toastr.success("Turno Atendido");
                    }else{
                        $(`#turno_${idTurno}`).css('color','red').text('No Atendido');
                        $(`#btoAtender_${idTurno}`).css('display','inline-block');
                        toastr.error("Turno no Atendido");
                    }
                }
            });
    }*/

     function atenderTurno(turno) {
            let now = new Date().getTime();
            let appointmentDate = new Date(turno.fecha).getTime();
            if (now > appointmentDate) {
                let idTurno = turno.id
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: '/tatuador/atender',
                    data: {
                        idTurno,
                        '_token': "{{ csrf_token() }}"
                    },
                    success: function (data) {
                        if (data.status === 200) {
                            $(`#turno_${idTurno}`).css('color', 'green').text('Atendido');
                            $(`#btoAtender_${idTurno}`).css('display', 'none');
                            $("#tr" + turno.id).fadeOut("slow");
                            toastr.success("Turno Atendido");
                        } else {
                            $(`#turno_${idTurno}`).css('color', 'red').text('No Atendido');
                            $(`#btoAtender_${idTurno}`).css('display', 'inline-block');
                            toastr.error("Turno no atendido");
                        }
                    }
                });
            } else {
                 toastr.error("No puede marcar un turno antes del día y hora fijada");
            }
        }


    function borrarTurno(idTurno){
        Swal.fire({
            //title: '<p class="text-danger">¿Está seguro de eliminar el turno?</p>',
            title: '<strong style="color:red;">¿Está seguro de eliminar el turno?</strong>',
            icon: 'danger',
            showCloseButton: true,
            showCancelButton: true,
            focusConfirm: false,
            confirmButtonText:'Aceptar',
            cancelButtonText:'Cancelar',
            }).then((result) => {
            if (result.isConfirmed) {
                $('#idTurno').val(idTurno);
                $( "#formDelete" ).submit();

            }
            })
    }

    </script>
@endsection
