@if(!empty($turnosAsignados))
<div class="row">
    <div class="col-2 offset" ></div>
    <div class="col-8">
        <div class="card">
            <div class="card-header"option style="background-color:black"selected>
                <h3 class="card-title titleModule">Listado de sus Turnos</h3>
                <h5>Solo puede eliminar turnos con 5 dias de anticipación</h5>
            </div>
            <!-- /.card-header -->
            <div class="card-body"option style="background-color:black"selected>

                <table id="listadoUsuario" class="table table-bordered table-striped" option style="background-color:black"selected>
                    <thead>
                        <tr>
                            <th style="width:22%; text-align:center">Tatuaje</th>
                            <th style="width:22%; text-align:center">Sucursal</th>
                            <th style="width:22%; text-align:center">Tatuador</th>
                            <th style="width:22%; text-align:center">Turno</th>
                            <th style="text-align:center">Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($turnosAsignados as $turnoAsignado)
                            <tr>
                                <th><img src="{{ url($turnoAsignado->tatuaje->imagen) }}" alt="" width="120" height="100"></th>
                                <th>
                                    <span>{{ $turnoAsignado->tatuador->sucursal->nombre }}</span>
                                    <span>{{ $turnoAsignado->tatuador->sucursal->direccion }}</span>
                                </th>
                                <th>
                                    <span>{{ $turnoAsignado->tatuador->apellido }}</span>
                                    <span>{{ $turnoAsignado->tatuador->nombre }}</span>
                                </th>
                                <th>
                                    <span>Fecha: {{ \Carbon\Carbon::parse($turnoAsignado->fecha)->format('d/m/Y') }}</span>
                                    <span>Hora: {{ \Carbon\Carbon::parse($turnoAsignado->fecha)->toTimeString() }} </span>
                                </th>
                                <th>
                                    <div class="text-center">
                                        @php
                                            $difference=0;
                                            $difference = \Carbon\Carbon::parse($turnoAsignado->fecha)->diff(\Carbon\Carbon::now())->days;
                                        @endphp
                                        @if($difference >= 5)
                                            <a href="javascript:void(0)" onclick="borrarTurno({{ $turnoAsignado->id }})"><i class="far fa-trash-alt"></i></a>
                                        @endif
                                    </div>
                                </th>
                            </tr>
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
</div>
@endif
