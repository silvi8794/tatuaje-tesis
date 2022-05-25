
<!-- Modal Views-->
<div class="modal fade" id="showSucursal{{ $sucursal->id}}"  tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header headerModel borderHeader">
                Sucursal
            </div>
            <div class="modal-body">


                        <div class="row" style="margin-top: 0px !important;">
                            <div class="col-2" style="text-align: right;">
                                <label for="title" class="col-form-label text-right colorLabel">Nombre</label>
                            </div>
                            <div class="col-4">
                                @if(!empty($sucursal->nombre))
                                    <input type="text" class="form-control colorInput" value="{{ $sucursal->nombre }}" disabled>
                                @else
                                    <input type="text" class="form-control colorInput" value="" disabled>
                                @endif


                            </div>
                            <div class="col-2" style="text-align: right;">
                                <label class="col-form-label colorLabel">Dirección</label>
                            </div>
                            <div class="col-3" style="text-align: left;">
                                @if(!empty($sucursal->direccion))
                                    <input type="text" class="form-control colorInput" value="{{ $sucursal->direccion }}" disabled>
                                @else
                                    <input type="text" class="form-control colorInput" value="" disabled>
                                @endif

                            </div>
                        </div>


                        <div class="row">
                                <div class="col-2" style="text-align: right;">
                                    <label for="title" class="col-form-label text-right colorLabel">Horario de Apertura</label>
                                </div>
                                <div class="col-4 mb-4">
                                    @if((!empty($sucursal->horario_inicio)))
                                        <input type="text" class="form-control colorInput" value="{{ $sucursal->horario_inicio }}" disabled>
                                    @else
                                        <input type="text" class="form-control colorInput" value="" disabled>
                                    @endif

                                </div>

                                <div class="col-2" style="text-align: right;">
                                    <label class="col-form-label colorLabel">Horario de Cierre</label>
                                </div>
                                <div class="col-3" style="text-align: left;">
                                    @if(!empty($sucursal->horario_fin))
                                        <input type="text" class="form-control colorInput" value="{{ $sucursal->horario_fin }}" disabled>
                                    @else
                                        <input type="text" class="form-control colorInput" value="" disabled>
                                    @endif

                                </div>
                        </div>

                        <div class="row">
                                <div class="col-2" style="text-align: right;">
                                    <label for="title" class="col-form-label text-right colorLabel">Localidad</label>
                                </div>
                                <div class="col-4 mb-4">
                                    @if((!empty($sucursal->localidad)))
                                        <input type="text" class="form-control colorInput" value="{{ $sucursal->localidad->nombre }}" disabled>
                                    @else
                                        <input type="text" class="form-control colorInput" value="" disabled>
                                    @endif

                                </div>

                                <div class="col-2" style="text-align: right;">
                                    <label class="col-form-label colorLabel">Provincia</label>
                                </div>
                                <div class="col-3" style="text-align: left;">
                                    @if(!empty($sucursal->localidad))
                                        <input type="text" class="form-control colorInput" value="{{ $sucursal->localidad->provincia->nombre }}" disabled>
                                    @else
                                        <input type="text" class="form-control colorInput" value="" disabled>
                                    @endif

                                </div>
                        </div>




            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">cerrar</button>
            </div>
        </div>
    </div>
</div>
</div>




