
<!-- Modal Views-->
<div class="modal fade" id="showTatuaje{{ $tatuaje->id}}"  tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header headerModel borderHeader">
                Tatuaje
            </div>
            <div class="modal-body">

                        <div class="row" style="margin-top: 0px !important;">
                            <div class="col-2" style="text-align: right;">
                                <label for="title" class="col-form-label text-right colorLabel">Imagen</label>
                            </div>
                            <div class="col-4">
                                @if(!empty($tatuaje->imagen))
                                    <img src="{{url($tatuaje->imagen)}}" class="img-circle elevation-2" alt="User Image" style="width:80px; height:80px" id="img-circle-avatar">
                                @else
                                    <img src="{{ asset('dist/img/logo-tattoo.jpg') }}"  class="img-circle elevation-2" alt="User Image" style="width:80px; height:80px" id="img-circle-avatar">
                                @endif


                            </div>
                        </div>
                        

                        <div class="row mb-4">
                            <div class="col-2" style="text-align: right;">
                                <label for="title" class="col-form-label text-right colorLabel">Nombre</label>
                            </div>
                            <div class="col-4">
                                @if(!empty($tatuaje->nombre))
                                    <input type="text" class="form-control colorInput" value="{{ $tatuaje->nombre }}" disabled>
                                @else
                                    <input type="text" class="form-control colorInput" value="" disabled>
                                @endif


                            </div>
                            <div class="col-2" style="text-align: right;">
                                <label class="col-form-label colorLabel">Fuente</label>
                            </div>
                            <div class="col-3" style="text-align: left;">
                                @if(!empty($tatuaje->fuente))
                                    <input type="text" class="form-control colorInput" value="{{ $tatuaje->fuente }}" disabled>
                                @else
                                    <input type="text" class="form-control colorInput" value="" disabled>
                                @endif
                            </div>
                        </div>



                        <div class="row mb-4">
                            <div class="col-2" style="text-align: right;">
                                <label for="title" class="col-form-label text-right colorLabel">Tamaño</label>
                            </div>
                            <div class="col-4">
                                @if(!empty($tatuaje->tamaño))
                                    <input type="text" class="form-control colorInput" value="{{ $tatuaje->tamaño }}" disabled>
                                @else
                                    <input type="text" class="form-control colorInput" value="" disabled>
                                @endif


                            </div>
                            <div class="col-2" style="text-align: right;">
                                <label class="col-form-label colorLabel">Categorias</label>
                            </div>
                            <div class="col-3" style="text-align: left;">
                                 @if(!empty($tatuaje->categorias))
                                    @foreach ($tatuaje->categorias as $itemCategorias)
                                        <span>
                                            {{$itemCategorias->nombre}}
                                            @if(!$loop->last)
                                            {{ ', ' }}
                                            @endif
                                        </span>



                                    @endforeach
                                @endif 
                            </div>
                        </div>



                        <div class="row mb-4">
                            <div class="col-2" style="text-align: right;">
                                <label for="title" class="col-form-label text-right colorLabel">Sexos</label>
                            </div>
                            <div class="col-4">
                                @if(!empty($tatuaje->sexos))
                                    @foreach ($tatuaje->sexos as $itemSexos)
                                        <span>
                                            {{$itemSexos->nombre}}
                                            @if(!$loop->last)
                                            {{ ', ' }}
                                            @endif
                                        </span>



                                    @endforeach
                                @endif 


                            </div>
                            <div class="col-2" style="text-align: right;">
                                <label class="col-form-label colorLabel">Lugares</label>
                            </div>
                            <div class="col-3" style="text-align: left;">
                                 @if(!empty($tatuaje->lugares))
                                    @foreach ($tatuaje->lugares as $itemLugar)
                                        <span>
                                            {{$itemLugar->nombre}}
                                            @if(!$loop->last)
                                            {{ ', ' }}
                                            @endif
                                        </span>



                                    @endforeach
                                @endif 
                            </div>
                        </div>



            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
</div>




