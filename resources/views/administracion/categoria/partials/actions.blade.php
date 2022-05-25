
<!-- Modal Views-->
<div class="modal fade" id="showCategoria{{ $categoria->id}}"  tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header headerModel borderHeader">
                Categoria
            </div>
            <div class="modal-body">


                        <div class="row" style="margin-top: 0px !important;">
                            <div class="col-2" style="text-align: right;">
                                <label for="title" class="col-form-label text-right colorLabel">Nombre</label>
                            </div>
                            <div class="col-4">
                                @if(!empty($categoria->nombre))
                                    <input type="text" class="form-control colorInput" value="{{ $categoria->nombre }}" disabled>
                                @else
                                    <input type="text" class="form-control colorInput" value="" disabled>
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



