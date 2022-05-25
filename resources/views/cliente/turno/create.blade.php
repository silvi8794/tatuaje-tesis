@extends('cliente.layouts.app_client')
@extends('cliente.navbar.navbar')



@section('content')

<section class="hero-wrap js-fullheight mb-5">
    <div id="contacto">

        <section class="ftco-section contact-section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-12 mb-12 text-center">
                        <h2 class="h5 font-weight-bold">TURNOS</h2>
                    </div>
                </div>
                <div class="row block-12">
                          <div class="col-md-4 text-md-right contact-info ftco-animate"></div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-12 ftco-animate">

                  {{-- <form action="#" class="contact-form"> --}}
                    <div class="row mb-5">
                        <div class="col-2 offset"></div>
                      <div class="col-8">
                          <select name="tatuador" id="tatuador" class="form-control" onchange="selectTatuador()">
                              <option style="background-color:black" value="0" selected disabled>Seleccionar Tatuador</option>
                              @foreach ($tatuadores as $tatuador)
                                <option style="background-color:black" value="{{ $tatuador->id }}">{{ $tatuador->apellido }}, {{ $tatuador->nombre }} ( Sucursal - {{ $tatuador->sucursal->localidad->nombre }})</option>
                              @endforeach
                          </select>
                      </div>
                    </div>
                    <div class="row hiddenCarrusel">
                        <div class="col-md-12 mb-12 text-center">
                            <h2 class="h5 font-weight-bold">SELECCIONE SU TATUAJE</h2>
                        </div>
                    </div>
                    <div class="row mb-5 mt-5 hiddenCarrusel">
                        <div class="col-2 offset"></div>
                        <div class="col-8">


                        <!--Carousel Wrapper-->
                        <div id="multi-item-example" class="carousel slide carousel-multi-item carousel-multi-item-2">

                            <!--Controls-->
                            <div class="controls-top text-center">
                                <a class="black-text" href="#multi-item-example" data-slide="prev"><i class="fas fa-angle-left fa-3x pr-3"></i></a>
                                <a class="black-text" href="#multi-item-example" data-slide="next"><i class="fas fa-angle-right fa-3x pl-3"></i></a>
                            </div>
                            <!--/.Controls-->

                            <!--Slides-->
                            <div class="carousel-inner" role="listbox">


                            <!--Third slide-->
                            <div class="carousel-item active">
                                <div class="row">
                                    @php
                                        $cont = 0;
                                    @endphp
                                    @foreach ($tatuajes as $tatuaje)
                                        @php
                                            $cont++
                                        @endphp
                                            <div class="col-md-3 mb-3">
                                                <div class="card">
                                                    <img src="{{ url($tatuaje->imagen) }}" width="100%" height="250" alt="Card image cap" onclick="seleccionImagen({{ $tatuaje }})">
                                                </div>
                                            </div>
                                        @if($cont>3)
                                                </div>
                                            </div>
                                            <div class="carousel-item">
                                                <div class="row">
                                            @php
                                                $cont=0;
                                            @endphp
                                        @endif
                                    @endforeach
                                    @if($cont<3)
                                                </div>
                                            </div>
                                    @endif

                                </div>

                            </div>
                            <!--/.Third slide-->

                            </div>
                            <!--/.Slides-->

                        </div>
                        <!--/.Carousel Wrapper-->
                        </div>

                        <div class="row">
                            <div class="col-2 offset"></div>
                            <div class="col-4">
                                <span class="hiddenTatuajeSeleccionado">TATUAJE SELECCIONADO</span>
                                <a href="#" class="hiddenTatuajeSeleccionado" role="button" onclick="cambiarTatuaje()">Cambiar Tatuaje</a>
                            </div>
                            <div class="col-4">
                                <img src="" alt="" class="hiddenTatuajeSeleccionado tatuajeSeleccionado" width="400" height="500">

                            </div>

                        </div>

                    </div>


                    <div class="row mt-4">
                        <div class="col-md-12 mb-12 text-center">
                            <h2 class="h5 font-weight-bold"></h2>
                             <p style="color:#DCDCDC";>Indique la fecha y hora en la que desea realizarse el tatuaje en el siguiente calendario. No se puede realizar una </p>
                             <p style="color:#DCDCDC";> reserva en la fecha actual. Debe hacerlo con un dia de anticipación.</p>
                             <p style="color:#DCDCDC">Se muestra a continuación los turnos que ya cuentan con sus respectivas reservas.</p>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-12 mb-12 text-center">
                            <h2 class="h5 font-weight-bold">FECHA</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2 offset"></div>
                        <div class="col-8">
                            <div id='calendar' disabled></div>
                        </div>
                    </div>



{{--                     <div class="row">
                        <div class="col-2 offset"></div>
                        <div class="col-8">
                            <div class="form-group">
                                <input type="submit" value="Reservar" class="btn btn-primary py-3 px-5">
                              </div>
                        </div>
                    </div>

                  </form> --}}
                </div>
              </div>
            </div>




            <!-- Modal -->
            <div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                <form class="form-horizontal" method="POST" action="addEvent.php">

                    <div class="modal-header" style="background-color:#020808">
                        <h4 class="modal-title" id="myModalLabel">Seleccionar Turno</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body" style="background-color:#020808">
                        <input type="hidden" name="idTatuador" id="idTatuador">
                        <input type="hidden" name="idImagen" id="idImagen">

                        <p>
                            <span>Tatuador Seleccionado: <span class="tatuadorSelecionado"></span></span>
                        </p>
                        <p class="alert-danger hiddenAlertTatuador">Debe seleccionar un Tatuador</p>
                        <p>
                            <span>Tatuaje Seleccionado
                                <img src="" alt="" class="tatuajeSeleccionado hiddenTatuajeSeleccionado" width="200" height="200">
                            </span>
                        </p>
                        <p class="alert-danger hiddenAlertTatuaje">Debe seleccionar un Tatuaje</p>
                        <div class="form-group" style="background-color:#020808">
                            <div class="col-sm-10">
                                <span>Fecha</span>
                                <input type="text" name="fechaActual" id="fechaActual" disabled>
                                <input type="hidden" name="argStart" id="argStart">
                                <input type="hidden" name="dateFormat" id="dateFormat">
                            </div>
                        </div>
                        <div class="form-group" style="background-color:#020808">
                            <div class="col-sm-10">
                                <select name="turno" class="form-control" id="turno" onchange="seleccionarTurno()">
{{--                                     <option style="background-color:black" value="" selected>Seleccionar</option> --}}
{{--                                     <option style="background-color:black" value="08:00:00" >08:00 - 10:00</option>
                                    <option style="background-color:black" value="10:00:00" >10:00 - 12:00</option>
                                    <option style="background-color:black" value="16:00:00" >16:00 - 18:00</option>
                                    <option style="background-color:black" value="18:00:00" >18:00 - 20:00</option> --}}
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer" style="background-color:#020808">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-success btoSave" onclick="guardarTurno()" disabled>Agendar turno</button>
                    </div>
                </form>
                </div>
                </div>

              </div>
              <div id="viewRender">

            </div>


    </section>



    {{-- PARA LA GALERIA DE BOOTSTRAP

        https://mdbootstrap.com/plugins/jquery/gallery/

        --}}



@endsection

@section('scripts')
<script>
    var calendar;
    $(document).ready(function($) {
        vaciarSelectores();
        traerTurnos();
    });
    function vaciarSelectores(){
        $('#turno').empty();
         $('#turno').append("<option style='background-color:#020808' value='' selected disabled>Seleccione</option>");
        $('#turno').append("<option style='background-color:#050C08' value='08:00:00'>08:00 - 10:00 </option>");
        $('#turno').append("<option style='background-color:#050C08' value='10:00:00'>10:00 - 12:00 </option>");
        $('#turno').append("<option style='background-color:#050C08' value='16:00:00'>16:00 - 18:00 </option>");
        $('#turno').append("<option style='background-color:#050C08' value='18:00:00'>18:00 - 20:00 </option>");
        $('#idTatuador, #idImagen, #fechaActual, #argStart, #dateFormat').empty();
        $("#tatuador option[value='']").attr("selected",true);
        cambiarTatuaje();





    }
    function seleccionImagen(objTatuaje){
        $('#idImagen').val(objTatuaje.id);
        $('.hiddenCarrusel').css('display','none');
        $('.hiddenTatuajeSeleccionado').css('display','block');

        $('.tatuajeSeleccionado').attr("src",objTatuaje.imagen);
    }
    function cambiarTatuaje(){
        $('.hiddenCarrusel').css('display','flex');
        $('.hiddenTatuajeSeleccionado').css('display','none');
        $('.tatuajeSeleccionado').attr("src",'');
    }
    function seleccionarTurno(){
        var flag = true;
        if ($('.tatuadorSelecionado').is(':empty')){
            flag=false;
        }else{
            $('.hiddenAlertTatuador').css('display','none');
        }
        if ($('.tatuajeSeleccionado').attr('src') == ''){
            flag=false;
            $('.hiddenAlertTatuaje').css('display','block');
        }else{
            $('.hiddenAlertTatuaje').css('display','none');
        }
        if(flag){
            $('.btoSave').prop('disabled',false);
        }else{
            $('.btoSave').prop('disabled',true);
        }
    }

    function selectTatuador(){
        $('#idTatuador').val($('#tatuador option:selected').val());
        $('.tatuadorSelecionado').text($('#tatuador option:selected').text());
        var idTatuador = $('#tatuador').val();

        moment.locale('es');
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '/tatuador/calendario',
            data: {
                idTatuador
                },
            success: function(data){
                if(data.status === 200){
                    var calendarEl = document.getElementById('calendar');

                    calendar = new FullCalendar.Calendar(calendarEl, {
                        headerToolbar: {
                            left: 'prev,next today',
                            center: 'title',
                            right: 'dayGridMonth,timeGridWeek,timeGridDay'
                        },
                        editable: false,
                        allDaySlot: false,
                        hiddenDays: [ 0,6 ],
                        defaultDate: new Date(),
                        locale: 'es',
                        initialDate: new Date(),
                        navLinks: true, // can click day/week names to navigate views
                        selectable: true,
                        selectMirror: true,
                        select: function(arg) {

                            /* https://www.youtube.com/watch?v=lREmIuCQNcg&list=PLSuKjujFoGJ3yVQMps4A24g3eBSkUCLXZ&index=12 */

                            var date = new Date();
/*                             date.setDate(date.getDate() + 1); */
                            date.setDate(date.getDate());
                            if( (new Date(arg.start).getTime() > new Date(date).getTime()))
                            {
                                $('#argStart').val(arg.start);
                                var fecha = new Date(arg.start);
                                var fechaFormatDB = moment(fecha).format("YYYY-MM-DD");
                                var fechaFormatES = moment(fecha).format("DD-MM-YYYY");

                                $('#dateFormat').val(fechaFormatDB);

                                var flag = true;
                                if ($('.tatuadorSelecionado').is(':empty')){
                                    flag=false;
                                /*                                 console.log('entro en vacio tatuador') */
                                }else{
                                    $('.hiddenAlertTatuador').css('display','none');
                                }
                                /* $('div.previewWrapper div.previewContainer img').attr('src') == '' */
                                if ($('.tatuajeSeleccionado').attr('src') == ''){
                                    flag=false;
                                    $('.hiddenAlertTatuaje').css('display','block');
                                }else{
                                    $('.hiddenAlertTatuaje').css('display','none');
                                }

                                /*                             if(flag){
                                    $('.btoSave').prop('disabled',false);
                                }else{
                                    $('.btoSave').prop('disabled',true);
                                } */

                                $('#ModalAdd').modal('toggle');
                                $('#fechaActual').val(fechaFormatES);


                                var turnosDesabilitados = [];
                                var flag = false;
                                for (let index = 0; index < data.dataCalendar.length; index++) {
                                    const element = data.dataCalendar[index];
                                    if(element.start === fechaFormatDB){
                                        flag=true;
                                        turnosDesabilitados.push(element.turno);
                                        console.log('turnos a meter en el arreglo',element.turno)
                                    }
                                }
                                if(flag){
                                    for (let index = 0; index < turnosDesabilitados.length; index++) {
                                        $(`#turno option[value='${turnosDesabilitados[index]}']`).attr('disabled','disabled')
                                    }
                                }
                            }




                        },
/*                         eventClick: function(arg) {
                            if (confirm('Are you sure you want to delete this event?')) {
                                arg.event.remove()
                            }
                        }, */
                        /* eventClick: function(info) {
                                alert('Event: ' + info.event.title);
                                alert('Coordinates: ' + info.jsEvent.pageX + ',' + info.jsEvent.pageY);
                                alert('View: ' + info.view.type);

                                // change the border color just for fun
                                info.el.style.borderColor = 'red';
                            }, */





                        editable: true,
                        dayMaxEvents: true, // allow "more" link when too many events
                        events:data.dataCalendar

                    });

                    calendar.render();

                }
            }
        });








    }

    function guardarTurno(){

            var fechaInput = $('#argStart').val();
            var dateFormat = $('#dateFormat').val();
            var turno = $('#turno').val();
            var idTatuador = $('#idTatuador').val();
            var idImagen = $('#idImagen').val();

            var fecha = new Date(fechaInput);

            //$(`#turno option[value='${turno}']`).attr('disabled','disabled');
            $('#ModalAdd').modal('toggle');
            $("#turno").val('');
            $.ajax({
                type: "POST",
                dataType: "json",
                url: '/turnos/store',
                data: {
                    dateFormat,
                    turno,
                    idTatuador,
                    idImagen,
                    '_token':"{{ csrf_token() }}"
                    },
                success: function(data){
                    if(data.status===200){
                        vaciarSelectores();
                        actualizarCalendario();
                        traerTurnos();
                        toastr.success("Turno creado con éxito");
                    }else{
                        //$(`#turno option[value='${turno}']`).prop('disabled',false);
                        toastr.error("Turno no creado");
                    }
                }
            });
        }

    // MDB Lightbox Init
    $(function () {
        $('.carousel').carousel('pause');
        $("#mdb-lightbox-ui").load("mdb-addons/mdb-lightbox-ui.html");
    });
    function borrarTurno(id){

        Swal.fire({
            title: '<strong style="color:red;">¿Está seguro de eliminar el turno?</strong>',
            icon: 'danger',
            /*   html:
                'You can use <b>bold text</b>, ' +
                '<a href="//sweetalert2.github.io">links</a> ' +
                'and other HTML tags', */
            showCloseButton: true,
            showCancelButton: true,
            focusConfirm: false,
            confirmButtonText:'Aceptar',
            /*   confirmButtonAriaLabel: 'Thumbs up, great!', */
            cancelButtonText:'Cancelar',
            background: '#FFFFFF',
            /*   cancelButtonAriaLabel: 'Thumbs down' */
            }).then((result) => {
            if (result.isConfirmed) {
                $.get(`/turnos/${id}/eliminar_turno`, {_token: $('meta[name=csrf-token]').attr('content')},
                function(data){
                    if(data.status===200){
                        actualizarCalendario();
                        traerTurnos();
                        //mostrarMjeTatuador();
                        toastr.success("Turno eliminado con éxito");
                    }
                });
            }
            })

/*         swal({
          title: "Seguro Que quiere eliminar su turno?",
          type: "warning",
          showCancelButton: true,
          buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
  if (willDelete) {
    swal("Poof! Your imaginary file has been deleted!", {
      icon: "success",
    });
  } else {
    swal("Your imaginary file is safe!");
  }
}); */

/*         var mensaje;
        var opcion = confirm("Seguro de Eliminar el turno");
        if (opcion == true) {
            $.get(`/turnos/${id}/eliminar_turno`, {_token: $('meta[name=csrf-token]').attr('content')},
            function(data){
                if(data.status===200){
                    actualizarCalendario();
                    traerTurnos();
                    toastr.success("Turno Eliminado con Exito");
                }
            });
        } */


    }

    /*function mostrarMjeTatuador(id){
        if (result.isConfirmed) {
                $.get(`/turnos/${id}/eliminar_turno`, {_token: $('meta[name=csrf-token]').attr('content')},
                function(data){
                    if(data.status===200){
                         toastr.error("El cliente ha eliminado un turno");
                    }
                });
        }
     }
*/



    function traerTurnos(){
        $.get('/turnos/buscar_turno', {_token: $('meta[name=csrf-token]').attr('content')},
            function(data){
                viewRender(data);
            });
    }
    function viewRender(data) {
        $('#viewRender').css('display', 'block');
        $("#viewRender").html(data);
    }
    function actualizarCalendario(){



        var idTatuador = $('#tatuador').val();

        moment.locale('es');
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '/tatuador/calendario',
            data: {
                idTatuador
                },
            success: function(data){
                if(data.status === 200){

                    var calendarEl = document.getElementById('calendar');

                    calendar = new FullCalendar.Calendar(calendarEl, {
                        headerToolbar: {
                            left: 'prev,next today',
                            center: 'title',
                            right: 'dayGridMonth,timeGridWeek,timeGridDay'
                        },
                        editable: false,
                        allDaySlot: false,
                        hiddenDays: [ 0,6 ],
                        defaultDate: new Date(),
                        locale: 'es',
                        initialDate: new Date(),
                        navLinks: true, // can click day/week names to navigate views
                        selectable: true,
                        selectMirror: true,
                        select: function(arg) {

                            /* https://www.youtube.com/watch?v=lREmIuCQNcg&list=PLSuKjujFoGJ3yVQMps4A24g3eBSkUCLXZ&index=12 */

                            $('#argStart').val(arg.start);

                            var fecha = new Date(arg.start);
                            var fechaFormatDB = moment(fecha).format("YYYY-MM-DD");
                            var fechaFormatES = moment(fecha).format("DD-MM-YYYY");

                            $('#dateFormat').val(fechaFormatDB);

                            var flag = true;
                            if ($('.tatuadorSelecionado').is(':empty')){
                                flag=false;
                            }else{
                                $('.hiddenAlertTatuador').css('display','none');
                            }
                            if ($('.tatuajeSeleccionado').attr('src') == ''){
                                flag=false;
                                $('.hiddenAlertTatuaje').css('display','block');
                            }else{
                                $('.hiddenAlertTatuaje').css('display','none');
                            }


                            $('#ModalAdd').modal('toggle');
                            $('#fechaActual').val(fechaFormatES);


                            var turnosDesabilitados = [];
                            var flag = false;
                            for (let index = 0; index < data.dataCalendar.length; index++) {
                                const element = data.dataCalendar[index];
                                if(element.start === fechaFormatDB){
                                    flag=true;
                                    turnosDesabilitados.push(element.turno);
                                }
                            }
                            if(flag){
                                for (let index = 0; index < turnosDesabilitados.length; index++) {
                                    $(`#turno option[value='${turnosDesabilitados[index]}']`).attr('disabled','disabled')
                                }
                            }
                        },






                        editable: true,
                        dayMaxEvents: true, // allow "more" link when too many events
                        events:data.dataCalendar

                    });

                    calendar.render();

                }
            }
        });

    }

/*     document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        locale: 'es',
        initialDate: '2020-09-12',
        navLinks: true, // can click day/week names to navigate views
        selectable: true,
        selectMirror: true,

        });

        calendar.render();
     }); */

  </script>
{{--       <script>
        $(document).ready(function($) {
            $('#listadoUsuario').DataTable({
                language: {
                    url: '../js/es-ar.json' //Ubicacion del archivo con el json del idioma.
                }
            });
        });


        </script> --}}
@endsection
