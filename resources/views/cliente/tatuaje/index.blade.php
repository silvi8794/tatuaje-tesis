@extends('cliente.layouts.app_client')
@extends('cliente.navbar.navbar')

@section('content')
<section class="ftco-section">
                @if((!empty($tatuajesCategorias)) && (!empty($tatuajesLugares)))

                    @if((count($tatuajesCategorias)<=0) && (count($tatuajesLugares)<=0))
                    <div class="container">
                        <span>Lo sentimos no existen Categorias o Lugares con la palabra: {{ $search }}</span>
                    </div>
                    @endif
                @endif


                @if(!empty($tatuajesCategorias))
                    @if(count($tatuajesCategorias)>0)
                <div class="container">
                    <div class="row justify-content-center mb-5">
                        <div class="col-md-7 heading-section text-center ftco-animate">
                            <h2 class="mb-3">Por Categoria</h2>
                        </div>
                    </div>
                    <div class="row no-gutters">

                            @foreach($tatuajesCategorias as $itemTatuCate)

                            <div class="col-lg-6 mt-5 mb-5 d-flex">
                                <div class="coach d-sm-flex align-items-stretch">
                                    @if(!@empty($itemTatuCate->imagen))
                                        <div class="img" style="background-image: url({{$itemTatuCate->imagen}}) "></div>
                                    @else
                                        <div class="img order-xl-last" style="background-image: url(image/images/trainer-3.jpg);"></div>
                                    @endif
                                    <div class="text py-4 px-5 ftco-animate">
                                        <span class="subheading">Tatuaje</span>
                                        <h3><a href="#">{{ $itemTatuCate->nombre }}</a></h3>
                                        <p><span class="subTitle">Descripción:  {{ $itemTatuCate->descripcion }} </span></p>
                                        <!-- <p><span class="subTitle">Tamaño:  {{ $itemTatuCate->tamaño }} </span></p> -->
                                        <p><span class="subTitle">Fuente: {{ $itemTatuCate->fuente }}</span></p>
                                        <p><span class="subTitle">Categoria
                                            <ul>
                                                @foreach($itemTatuCate->categorias as $itemCategoria)
                                                    <li>{{ $itemCategoria->nombre }}</li>
                                                @endforeach
                                            </ul>
                                            </span>
                                        </p>
                                        <p><span class="subTitle">Sexo
                                            <ul>
                                                @foreach($itemTatuCate->sexos as $itemSexo)
                                                    <li>{{ $itemSexo->nombre }}</li>
                                                @endforeach
                                            </ul>
                                            </span>
                                        </p>

                                        <!-- <ul class="ftco-social-media d-flex mt-4">
                                            <li class="ftco-animate"><a href="#" class="mr-2 d-flex justify-content-center align-items-center"><span class="icon-twitter"></span></a></li>
                                        </ul> -->
                                            
                                    </div>
                                </div>
                            </div>





                            @endforeach


                        </div>
                    </div>

                        @endif
                @endif
                @if(!empty($tatuajesLugares))
                    @if(count($tatuajesLugares)>0)
                    <div class="container">
                        <div class="row justify-content-center mb-5">
                            <div class="col-md-7 heading-section text-center ftco-animate">
                                <h2 class="mb-3">Por Lugar</h2>
                            </div>
                        </div>
                        <div class="row no-gutters">



                            @foreach($tatuajesLugares as $tatuaje)
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
                                               <!--  <p><span class="subTitle">Tamaño:  {{ $tatuaje->tamaño }} </span></p> -->
                                                <p><span class="subTitle">Fuente: {{ $tatuaje->fuente }}</span></p>

                                                <p><span class="subTitle">Sexo
                                                    <ul>
                                                        @foreach($tatuaje->sexos as $itemSexo)
                                                            <li>{{ $itemSexo->nombre }}</li>
                                                        @endforeach
                                                    </ul>
                                                    </span>
                                                </p>
                                                <p><span class="subTitle">Lugares
                                                    <ul>
                                                        @foreach($tatuaje->lugares as $itemLugar)
                                                            <li>{{ $itemLugar->nombre }}</li>
                                                        @endforeach
                                                    </ul>
                                                    </span>
                                                </p>
                                                <!-- <ul class="ftco-social-media d-flex mt-4">
                                                    <li class="ftco-animate"><a href="#" class="mr-2 d-flex justify-content-center align-items-center"><span class="icon-twitter"></span></a></li>
                                                </ul> -->
                                                    <p></p>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>

                            @endif
                        @endif

</section>
@endsection
