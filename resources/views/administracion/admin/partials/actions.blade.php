{{-- MODAL SEND EMAIL --}}

{{-- <div class="modal fade" id="sendUser{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <span class="colorLabelHeaderModal"> Email enviado </span>
            </div>
            <div class="modal-body">
                <label class="colorLabelTextModal">Se envio un email con la cuenta de usuario y contraseña reseteada...</label>
            </div>
            <div class="modal-footer deleteLine">
                <button type="button" class="btn btn-info" data-dismiss="modal">Aceptar</button>
            </div>
        </div>
    </div>
</div> --}}

<!-- Modal Views-->
<div class="modal fade" id="showUser{{ $user->id}}"  tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header headerModel borderHeader">
                Administrador
            </div>
            <div class="modal-body">


                        <div class="row" style="margin-top: 0px !important;">
                            <div class="col-2" style="text-align: right;">
                                <label for="title" class="col-form-label text-right colorLabel">Nombre</label>
                            </div>
                            <div class="col-4">
                                @if(!empty($user->nombre))
                                    <input type="text" class="form-control colorInput" value="{{ $user->nombre }}" disabled>
                                @else
                                    <input type="text" class="form-control colorInput" value="" disabled>
                                @endif


                            </div>
                            <div class="col-2" style="text-align: right;">
                                <label class="col-form-label colorLabel">Apellido</label>
                            </div>
                            <div class="col-3" style="text-align: left;">
                                @if(!empty($user->apellido))
                                    <input type="text" class="form-control colorInput" value="{{ $user->apellido }}" disabled>
                                @else
                                    <input type="text" class="form-control colorInput" value="" disabled>
                                @endif

                            </div>
                        </div>


                        <div class="row">
                                <div class="col-2" style="text-align: right;">
                                    <label class="col-form-label colorLabel">D.N.I</label>
                                </div>
                                <div class="col-3" style="text-align: left;">
                                    @if(!empty($user->dni))
                                        <input type="text" class="form-control colorInput" value="{{ $user->dni }}" disabled>
                                    @else
                                        <input type="text" class="form-control colorInput" value="" disabled>
                                    @endif

                                </div>

                                <div class="col-2" style="text-align: right;">
                                    <label for="title" class="col-form-label text-right colorLabel">Email</label>
                                </div>
                                <div class="col-4 mb-4">
                                    @if((!empty($user->email)))
                                        <input type="text" class="form-control colorInput" value="{{ $user->email }}" disabled>
                                    @else
                                        <input type="text" class="form-control colorInput" value="" disabled>
                                    @endif

                                </div>
                        </div>
                        <div class="row">

                                <div class="col-2" style="text-align: right;">
                                    <label class="col-form-label colorLabel">Sexo</label>
                                </div>
                                <div class="col-3" style="text-align: left;">
                                    @if(!empty($user->sexo))
                                        <input type="text" class="form-control colorInput" value="{{ $user->sexo->nombre }}" disabled>
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
                                    @if((!empty($user->localidad)))
                                        <input type="text" class="form-control colorInput" value="{{ $user->localidad->nombre }}" disabled>
                                    @else
                                        <input type="text" class="form-control colorInput" value="" disabled>
                                    @endif

                                </div>

                                <div class="col-2" style="text-align: right;">
                                    <label class="col-form-label colorLabel">Provincia</label>
                                </div>
                                <div class="col-3" style="text-align: left;">
                                    @if(!empty($user->localidad))
                                        <input type="text" class="form-control colorInput" value="{{ $user->localidad->provincia->nombre }}" disabled>
                                    @else
                                        <input type="text" class="form-control colorInput" value="" disabled>
                                    @endif

                                </div>
                        </div>
                        <div class="row">



                        </div>





            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
</div>







 <!-- Modal Delete User-->
{{--  <div class="modal fade" id="deleteUser{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header headerModel">
            <h5 class="modal-title colorLabel" id="staticBackdropLabel">Eliminar Administrador</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
          {!! Form::open(['route' => 'admin.delete']) !!}
        <div class="modal-body">

                     @method('DELETE')
                    {{ Form::hidden('id', $user->id) }}
                <label class="colorLabel">Seguro desea eliminar el administrador</label><br>
                <label class="colorLabelDelete">"{{ $user->apellido}}, {{ $user->nombre }}"</label>


        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

        <form action="users/delete" method="POST">
            <input type="hidden" name="id" value="{{$user->id}}">
            @csrf
            <button type="submit" class="btn btn-danger">
                    Delete
            </button>
        </form>
        <button type="submit" class="btn btn-danger">Delete</button>
        </div>
         {!! Form::close() !!}
    </div>
    </div>
</div>
 --}}


