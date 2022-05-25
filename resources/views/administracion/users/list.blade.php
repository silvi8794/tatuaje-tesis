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
                    <h3 class="card-title titleModule">Listado de Tatuadores </h3>
                </div>

                <div class="col-lg-9">
                        <a href="{{ route('users.create') }}" class="btn btn-info float-right" role="button" style=" border-bottom: 10px solid #ffffff margin-left: 5px; margin-top: 15px; margin-bottom: 5px; margin-right: 5px ">Crear Tatuador</a>
                </div>
                </div>

                <!-- /.card-header -->
                <div class="card-body">
                    <!-- <div class="col-2">
                        <a href="{{ route('users.create') }}" class="btn btn-info" role="button">Crear Usuario</a>
                    </div> -->

                    <table id="listadoUsuario" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width:50%; text-align:center">Nombre y Apellido</th>
                                <th style="width:10%; text-align:center">Email</th>
                                <th style="width:10%; text-align:center">DNI</th>
                                <th style="width:20%; text-align:center">Tipo Usuario</th>
                                <th style="text-align:center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                               <tr>
                                    <td style=" text-align:center">
                                        @if(!empty($user))
                                            {{ $user->nombre }}, {{ $user->apellido }}
                                        @endif
                                    </td>
                                    <td style=" text-align:center">
                                        @if(!empty($user))
                                            {{ $user->email }}
                                        @endif
                                    </td>
                                    <td style=" text-align:center">
                                        @if(!empty($user))
                                            {{ $user->dni }}
                                        @endif
                                    </td>

                                    <td style=" text-align:center">
                                        @if(!empty($user->user->user_type))
                                            {{ $user->user->user_type->nombre }}
                                        @endif
                                    </td>

                                    <td>
                                        <div class="d-flex justify-content-center">

                                            <button type="button" class="btn paddBto" data-user="{{$user}}" data-toggle="modal" data-target="#showUser{{ $user->id }}">
                                                <i class="fas fa-search"></i>
                                            </button>
                                            <form action="{{$user->id}}/edit" method="GET">
                                                <button type="submit" class="btn">
                                                        <i class="far fa-edit"></i>
                                                </button>
                                            </form>
                                                {!! Form::open(['route' => 'users.delete','id'=>'formDelete', 'name'=>'formDelete']) !!}
                                                    @method('DELETE')
                                                    {{-- {{ Form::hidden('id', $user->id) }} --}}
                                                    <input type="hidden" name="id" id="idUser">
                                                    {{-- id="btnDelete"  --}}
                                                        <button type="button" class="btn" onclick="borrarUsuario({{$user->id}})">
                                                            <i class="far fa-trash-alt" style="color:red;"></i>
                                                        </button>
                                                {!! Form::close() !!}

                                            {{-- <button type="button" class="btn paddBto" data-user="{{$user}}" data-toggle="modal" data-target="#sendUser{{ $user->id }}" onclick="resetearContrasenia({{ $user->id }})">
                                                <i class="fas fa-paper-plane" style="color:rgb(66, 66, 184);"></i>
                                            </button> --}}

                                        </div>
                                    </td>
                                </tr>
                                @include('administracion/users/partials/actions')

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




    function resetearContrasenia(userId){
        $.ajax({
            type: "POST",
            dataType: "json",
            url: '/users/sendemail',
            data: {
                userId,
                '_token':"{{ csrf_token() }}"
            },
            success: function(data){
              if(data.success === 200){
              }else{

              }
            }


        });
    }




    function borrarUsuario(idUser){
        Swal.fire({
            title: '<strong style="color:red;">¿Está seguro de eliminar el tatuador?',
            icon: 'danger',
            showCloseButton: true,
            showCancelButton: true,
            focusConfirm: false,
            confirmButtonText:'Aceptar',
            cancelButtonText:'Cancelar',
            }).then((result) => {
            if (result.isConfirmed) {
                $('#idUser').val(idUser)
                $( "#formDelete" ).submit();
            }
            })
    }


    </script>
@endsection
