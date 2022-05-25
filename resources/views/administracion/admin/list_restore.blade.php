@extends('administracion.layouts.app')

@extends('administracion.navbar.navbar')

@extends('administracion.menu.menu')

@section('content')






<div class="content-wrapper">




    <!-- <section class="main-header navbar navbar-expand" style="position: fixed; left: 0; right: 0; top: 57px; z-index: 1; background-color: white; height:60px;"> -->
        <div class="container-fluid">
           {{--  <div class="col-3 mt-2">
                    <div class="labelText">
                        <label>Show
                            <select name="page_length" id="page_length" aria-controls="pageLength" class="myClassic">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                            entries
                        </label>
                    </div>
            </div> --}}
{{--             <div class="col-4 mt-4">
                <label class="labelText"> Search: </label>
                <input type="text" id="searchDatatable" class="inputSearch">
            </div> --}}
{{--             <div class="col-2">
                <a href="{{ route('users.create') }}" class="btn float-right colorCyan" role="button">+ Add User</a>
            </div> --}}
           {{--  <div class="col-3 d-flex btn-container-menu" style="margin-left: auto">
                <div style="background-color: #386FB5;" role="button" class="iconList iconListPdf text-center" >
                    <a href="#">
                       <svg xmlns="http://www.w3.org/2000/svg" id="Capa_1" enable-background="new 0 0 512 512"  width="1em" height="1em" viewBox="0 0 512 512"  class=""><g><g><path d="m458 145h-404c-24.813 0-45 20.187-45 45v180c0 24.813 20.187 45 45 45h404c24.813 0 45-20.187 45-45v-180c0-24.813-20.187-45-45-45zm-330.259 158.338c-3.835 0-10.387.027-16.52.058v34.597c0 8.284-6.716 15-15 15s-15-6.716-15-15l-.221-113.945c-.013-3.986 1.562-7.814 4.376-10.638s6.638-4.41 10.624-4.41h31.741c26.356 0 47.799 21.16 47.799 47.169s-21.443 47.169-47.799 47.169zm128.768 46.038c-8.934.156-31.281.241-32.228.245-.019 0-.038 0-.057 0-3.958 0-7.757-1.564-10.567-4.354-2.824-2.803-4.418-6.613-4.433-10.592-.001-.4-.224-110.646-.224-110.646-.007-3.983 1.569-7.806 4.383-10.625s6.634-4.404 10.617-4.404h31.33c35.692 0 59.672 28.256 59.672 70.311 0 40.006-24.6 69.473-58.493 70.065zm153.711-86.026c8.284 0 15 6.716 15 15s-6.716 15-15 15h-27.22v42.65c0 8.284-6.716 15-15 15s-15-6.716-15-15v-113.158c0-8.284 6.716-15 15-15h45.863c8.284 0 15 6.716 15 15s-6.716 15-15 15h-30.863v25.508z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#FFFFFF"/><path d="m255.33 239h-16.303c.023 13.54.105 67.514.147 80.543 6.242-.04 12.926-.095 16.811-.163 20.045-.35 29.018-20.377 29.018-40.069-.001-9.457-2.14-40.311-29.673-40.311z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#FFFFFF"/><path d="m127.741 239h-16.696c.018 6.675.035 13.776.035 17.169 0 3.965.028 10.842.06 17.228 6.156-.031 12.732-.059 16.602-.059 9.648 0 17.799-7.862 17.799-17.169s-8.152-17.169-17.8-17.169z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#FFFFFF"/><path d="m442.455 115c-3.477-9.53-8.877-18.338-16.027-25.88l-62.305-65.721c-14.098-14.87-33.936-23.399-54.428-23.399h-199.695c-24.813 0-45 20.187-45 45v70z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#FFFFFF"/><path d="m65 445v22c0 24.813 20.187 45 45 45h292c24.813 0 45-20.187 45-45v-22z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#FFFFFF"/></g></g> </svg>
                     </a>
                 </div>
                <div style="background-color: #24A745;" role="button" class="iconList iconListExcel text-center" >
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" width="1em" height="1em" class=""><g transform="matrix(0.904382 0 0 0.904382 24.4782 24.4782)"><g>
                            <g>
                                <path d="M496,80.011H288v-48c0-4.768-2.112-9.28-5.792-12.32c-3.648-3.04-8.544-4.352-13.152-3.392l-256,48    C5.472,65.707,0,72.299,0,80.011v352c0,7.68,5.472,14.304,13.056,15.712l256,48c0.96,0.192,1.952,0.288,2.944,0.288    c3.712,0,7.328-1.28,10.208-3.68c3.68-3.04,5.792-7.584,5.792-12.32v-48h208c8.832,0,16-7.168,16-16v-320    C512,87.179,504.832,80.011,496,80.011z M220.032,309.483c5.824,6.624,5.152,16.736-1.504,22.56    c-3.04,2.656-6.784,3.968-10.528,3.968c-4.448,0-8.864-1.856-12.032-5.472l-46.528-53.152l-40.8,52.48    c-3.168,4.032-7.904,6.144-12.64,6.144c-3.424,0-6.88-1.088-9.824-3.36c-6.976-5.44-8.224-15.488-2.816-22.464l44.608-57.344    l-44-50.304c-5.824-6.624-5.152-16.736,1.504-22.56c6.624-5.824,16.704-5.184,22.592,1.504L148,227.115l47.392-60.928    c5.44-6.944,15.488-8.224,22.464-2.784c6.976,5.408,8.224,15.456,2.784,22.464l-51.2,65.792L220.032,309.483z M480,400.011H288    v-32h48c8.832,0,16-7.168,16-16c0-8.832-7.168-16-16-16h-48v-32h48c8.832,0,16-7.168,16-16c0-8.832-7.168-16-16-16h-48v-32h48    c8.832,0,16-7.168,16-16c0-8.832-7.168-16-16-16h-48v-32h48c8.832,0,16-7.168,16-16c0-8.832-7.168-16-16-16h-48v-32h192V400.011z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#FFFFFF"/>
                            </g>
                        </g><g>
                            <g> <path d="M432,144.011h-32c-8.832,0-16,7.168-16,16c0,8.832,7.168,16,16,16h32c8.832,0,16-7.168,16-16    C448,151.179,440.832,144.011,432,144.011z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#FFFFFF"/>
                            </g></g><g>
                            <g>
                                <path d="M432,208.011h-32c-8.832,0-16,7.168-16,16c0,8.832,7.168,16,16,16h32c8.832,0,16-7.168,16-16    C448,215.179,440.832,208.011,432,208.011z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#FFFFFF"/>
                            </g>
                        </g><g>
                            <g>
                                <path d="M432,272.011h-32c-8.832,0-16,7.168-16,16c0,8.832,7.168,16,16,16h32c8.832,0,16-7.168,16-16    C448,279.179,440.832,272.011,432,272.011z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#FFFFFF"/>
                            </g>
                        </g><g>
                            <g>
                                <path d="M432,336.011h-32c-8.832,0-16,7.168-16,16c0,8.832,7.168,16,16,16h32c8.832,0,16-7.168,16-16    C448,343.179,440.832,336.011,432,336.011z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#FFFFFF"/>
                            </g>
                        </g></g> </svg>
                     </a>
                 </div>
                <div  class="iconList iconListPrint text-center" role="button" >
                    <a href="#">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-printer-fill" fill="#fff" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5z"/>
                            <path fill-rule="evenodd" d="M11 9H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"/>
                            <path fill-rule="evenodd" d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                          </svg>
                     </a>
                 </div>
                <div  class="iconList iconListRefresh text-center" role="button" >
                   <a href="#">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-repeat" fill="black" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M2.854 7.146a.5.5 0 0 0-.708 0l-2 2a.5.5 0 1 0 .708.708L2.5 8.207l1.646 1.647a.5.5 0 0 0 .708-.708l-2-2zm13-1a.5.5 0 0 0-.708 0L13.5 7.793l-1.646-1.647a.5.5 0 0 0-.708.708l2 2a.5.5 0 0 0 .708 0l2-2a.5.5 0 0 0 0-.708z"/>
                        <path fill-rule="evenodd" d="M8 3a4.995 4.995 0 0 0-4.192 2.273.5.5 0 0 1-.837-.546A6 6 0 0 1 14 8a.5.5 0 0 1-1.001 0 5 5 0 0 0-5-5zM2.5 7.5A.5.5 0 0 1 3 8a5 5 0 0 0 9.192 2.727.5.5 0 1 1 .837.546A6 6 0 0 1 2 8a.5.5 0 0 1 .501-.5z"/>
                    </svg>
                    </a>
                </div>
            </div> --}}
        </div><!-- /.container-fluid -->
    <!-- </section> -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title titleModule">Listado de Administradores</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    <table id="listadoAdministrador" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width:50%; text-align:center">Nombre y Apellido</th>
                                <th style="width:10%; text-align:center">Email</th>
                                <th style="width:10%; text-align:center">DNI</th>
                                <th style="text-align:center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($admin as $user)
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
                                    <td>
                                        <div class="d-flex justify-content-center">
                                                <button type="button" class="btn paddBto" id="btoRestore_{{$user->id}}" onclick="activarUser({{$user->id}})" >
                                                    <i class="fas fa-check" style="color:green;"></i>
                                                </button>
                                        </div>
                                    </td>
                                </tr>
                                @include('administracion/admin/partials/actions')

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
        $('#listadoAdministrador').DataTable({
            language: {
                url: '../js/es-ar.json' //Ubicacion del archivo con el json del idioma.
            }
        });
    });



    function activarUser(userId){
        $.ajax({
                type: "POST",
                dataType: "json",
                url: '/admin/restore',
                data: {
                    userId,
                    '_token':"{{ csrf_token() }}"
                    },
                success: function(data){
                    if(data.status===200){
                        $(`#btoRestore_${userId}`).css('display','none');
                        toastr.success("Usuario Activado");
                    }else{
                        $(`#btoRestore_${userId}`).css('display','inline-block');
                        toastr.error("Usuario No Activado");
                    }
                }
            });
    }




    </script>
@endsection
