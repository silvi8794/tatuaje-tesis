@extends('cliente.layouts.app_client')
@extends('cliente.navbar.navbar')

@section('content')

<section class="hero-wrap js-fullheight">
    <div class="overlay" style="background-image: url(image/images/fondo_negro.jpg);" data-stellar-background-ratio="0.5"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-end">
            <h3 class="v">
<!--                 <a href="https://vimeo.com/45830194" class="popup-vimeo"> -->
<!--                     <div class="icon d-flex justify-content-center align-items-center">
                        <span class="icon-play"></span>
                    </div> -->
                    <span>Sould Tattoo</span> <br>Working Harder
                </a>
            </h3>
            <div class="col-md-12 text-center ftco-animate">
                <h1 class="mt-5" style="background-image: url(image/images/fondo-color-rojo-oscuro.jpg);" data-stellar-background-ratio="0.5">Sould<br>Tattoo</h1>
                <h2>Sould Tattoo. Working Harder</h2>
            </div>
        </div>





    </div>
</section>



<div id="nuestrosTrabajos">
        <section class="ftco-section">
            <div class="container">
              <section class="ftco-work d-md-flex" >
                <div id="#work" class="one-half img">
                  <div class="container">
                    <div class="row justify-content-center mb-5">
                      <div class="col-md-7 heading-section text-center ftco-animate">
    <!--  {{--                   <span class="subheading">
                          <i class="db-left"></i>
                          <i class="db-right"></i>
                      </span> --}} -->
                     <h2 class="mb-3">Nuestros Trabajos</h2>
                        <p>Es una pagina dedicada al tatuaje creado para entretener, inspirar y conectar estudios de tatuajes, artistas tatuadores y todos los fans del arte corporal. También es la galería de fotos de tatuajes más importante de la web.</p>
                      </div>
                    </div>
                  </div>
                </div>
              </section>


            <div class="row no-guttersover">
                @foreach($tatuajes as $tatuaje)
                <div class="overlay">
                  <div id="Trabajo{{$tatuaje->id}}" >
                    <!-- Modal -->
                    <div class="modal fade" id="PopUpInformacion{{$tatuaje->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document" >
                        <div class="modal-content">
                          <div class="modal-header" style="background-color:#06060A">
                            <h3 class="modal-title" id="exampleModalLabel" font-family= "Montserrat_Bold"> {{ $tatuaje->nombre }}</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        <div class="modal-body" style="background-color:#06060A">
                           <div class="row">
                              <div class="col">
                                  <div class="col-md-3 mb-3">
                                    <div class="card">
                                      <img class="img" src="{{ $tatuaje->imagen }}" width="450px" height="600px"  onclick="vermas({{ $tatuaje->id }})">

                                    </div>
                                  </div>
                              </div>

                              <div class="col">
                                <p><span class="subTitle" style="color:#FFFFFF">Descripción:  {{ $tatuaje->descripcion }} </span></p>

                                 <p><span class="subTitle" style="color:#FFFFFF">Fuente: {{ $tatuaje->fuente }}
                                 </span></p>

                                <p><span class="subTitle" style="color:#FFFFFF">Categoria:
                                <ul>
                                  @foreach($tatuaje->categorias as $itemCategoria)
                                    <li>{{ $itemCategoria->nombre }}</li>
                                  @endforeach
                                </ul>
                                  </span>
                                </p>

                                <p><span class="subTitle" style="color:#FFFFFF">Sexo:
                                  <ul>
                                  @foreach($tatuaje->sexos as $itemSexo)
                                     <li>{{ $itemSexo->nombre }}</li>
                                  @endforeach
                                  </ul>
                                  </span>
                                </p>

                                <p><span class="subTitle" style="color:#FFFFFF">Lugares:
                                  <ul>
                                   @foreach($tatuaje->lugares as $itemLugar)
                                     <li>{{ $itemLugar->nombre }}</li>
                                  @endforeach
                                  </ul>
                                  </span>
                                </p>
                                <br>
                                <br>
                                <h6>- Seleccione en el menu <a href="/turnos/turno">turnos</a>.
                                    <br>- Seleccione un tatuador acorde a su ubicacion
                                    <br>- Seleccione el tatuaje que más le guste o una opción similar al que se quiera realizar
                                    <br>- Marque la fecha y hora del turno y listo! Te esperamos para un nuevo tatuaje
                                </h6>
                            </div>
                        </div>

                      </div>
                       <div class="modal-footer" style="background-color:#06060A">
                         <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                       </div>
                     </div>
                    </div>
                   </div>
                   <!-- Cierra el modal -->
                 </div>
                 <!-- Cierra el popup -->
              </div>



                        <div class="col-lg-6 mt-5 mb-5 d-flex">
                            <div class="coach d-sm-flex align-items-stretch">
                                @if(!@empty($tatuaje->imagen))
                                    <div class="img" style="background-image: url({{$tatuaje->imagen}}) "></div>
                                @else
                                    <div class="img order-xl-last" style="background-image: url(image/images/trainer-3.jpg);"></div>
                                @endif
                                <div class="text py-4 px-5 ftco-animate">
                                    <span class="subheading">Tatuaje</span>
                                    <h3><a href="#">{{ $tatuaje->nombre }}</a></h3>
                                    <p><span class="subTitle">Descripción:  {{ $tatuaje->descripcion }} </span></p>

                                   <!--  BOTON DE VER MAS -->
                                   <a href="#" id="enlace{{$tatuaje->id}}" data-toggle="modal" data-target="#PopUpInformacion{{$tatuaje->id}}">
                                    Ver mas
                                   </a>

                                </div>



                                    <!--  iconos de redes sociales -->
                                    <!-- <ul class="ftco-social-media d-flex mt-4">

                                         <li class="ftco-animate"><a href="#" class="mr-2 d-flex justify-content-center align-items-center"><span class="icon-twitter"></span></a></li>
                                        <li class="ftco-animate"><a href="#" class="mr-2 d-flex justify-content-center align-items-center"><span class="icon-facebook"></span></a></li>
                                        <li class="ftco-animate"><a href="#" class="mr-2 d-flex justify-content-center align-items-center"><span class="icon-instagram"></span></a></li>
                                    </ul> -->
                                        <p></p>

                            </div>

                        </div>

                        @endforeach


                    </div>

                   <!--  Centralizo el paginado -->
                    <div class="row">
                        <div class= "mx-auto">
                          <!--  {{ $tatuajes->links() }}-->
                          {!! $tatuajes->render() !!}
                        </div>
                    </div>
            </div>

        </section>
    </div>




    <div id="comoCuidarse">
        <section class="ftco-section">
            <div class="container">
                <div class="row justify-content-center mb-5">
              <div class="col-md-10 heading-section text-center ftco-animate">
                  <span class="subheading">

                  </span>
                <h2 class="mb-3">Como Cuidarse</h2>
                <p>
                <p>- Mantener el vendaje durante 4 horas (de lo contrario el tatuaje se adherirá a la ropa y al despegarlo extraerá el pigmento).</p>
                <p>- Luego de las 4 horas, sacar el vendaje y lavar con agua y jabón neutro. </p>
                <p>- Colocar crema 4 veces por día. (NO USAR PRODUCTOS A BASE DE PETROLEO NI VASELINA) </p>
                <p>- Evitar el exceso de crema, sol, agua salada o con cloro . No mantener en agua demasiado tiempo mas que un remojo. </p>
                <p>- No extraer las cáscaras y mantener el tatuaje alejado de la suciedad y grasitud. </p>
                <p>- Tomará aproximadamente 4 semanas en cicatrizar. </p>
                <p>- Usar la crema durante todo ese tiempo y un fuerte protector solar ayudará a mantener los colores vivos por  mucho mas tiempo. </p>


                <p style="color:#8B0000";><br><b> COSAS QUE NO DEBES HACER ANTES DE TATUARTE </b></p>
                <p style="color:#8B0000";>Es importante que sigas estas recomendaciones para ayudar a la cicatrización y el proceso de realización del mismo.
                <p style="color:#8B0000";>-Evita la ingesta de alcohol, ya que la misma produce sequedad y deshidratacion en la piel. Esto dificulta la tarea del tatuador, ya que el tatuar en una piel reseca es realmente engorroso, eso sin mencionar que el tatuaje pierde mucha calidad, es por esto que se recomienda evitar el alcohol por completo.
                <p style="color:#8B0000";>-El sueño y la buena alimentación antes del tatuaje ya que algunos tatuajes conllevan cierto grado de dolor, por mínimo que sea, este genera un desgaste físico considerable, es por ello que se recomienda dormir muy bien para estar muy descansado durante el proceso de realización. Tambien es importante, el comer unas pocas horas antes de la realización es importante para evitar descompensarse e incluso evitar desmayos durante el tatuaje, es por esto que debes estar muy bien alimentado y descansado.
                <p style="color:#8B0000";>-Humecta y no rasures tu piel antes del tatuaje ya que esto puede generar algún tipo de irritación y algún corte en la zona del tatuaje, si esto ocurre el trabajo del tatuador se dificultad ya que la piel irritada debe ser tatuada con mucho más cuidado.
                <p style="color:#8B0000";>-Es importante dejar tu agenda libre para ese dia ya que los tatuajes pueden tomar mucho tiempo, mucho más de lo que se cree, el artista del tatuaje te puede comentar que la realización se llevara cierto tiempo pero a veces este tiempo es mucho mayor, esto puede ocurrir por muchos factores. Recuerda que durante el proceso de realización es común que te canses y necesites un tiempo libre, a veces el tatuaje se lleva más tiempo del necesario, es por esto que debes evitar tener más compromisos ese día, para evitar que se crucen las citas.
</p>


                </p>
              </div>
            </div>
                </div>
            </div>
        </section>
    </div>

@endsection


