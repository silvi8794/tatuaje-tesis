@extends('administracion.layouts.app')
@extends('administracion.navbar.navbar')
@extends('administracion.menu.menu')

@section('content')


<div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Inicio</h1>
                    </div>
                    {{-- <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                        </ol>
                    </div><!-- /.col --> --}}
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->








        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
              <!-- Small boxes (Stat box) -->
              <div class="row">
                <div class="col-lg-4 col-6">
                  <!-- small box -->
                  <!-- <div class="small-box  d-flex" id="smallbox1" >
                       <div class="inner-icon" id="projects-home"  style="">
                          <svg width="5em" height="5em" viewBox="0 0 16 16" class="bi bi-grid-fill" fill="white" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5v-3zm8 0A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5v-3zm-8 8A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5v-3zm8 0A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5v-3z"/>
                            </svg>
                      </div>
                      <div class="inner ">
                      <h4 class="countNotification" style="color:#333a;">3</h4>
                      <p style="color:#333a;">Texto</p>
                      </div> -->
                  </div>
                </div>
                
                <!-- ./col -->
                <div class="col-lg-4 col-6">
                  <!-- small box -->
                  <!-- <div class="small-box d-flex" id="smallbox2" >
                      <div class="inner-icon" id="chart-home"  style="">
                          <svg width="5em" height="5em" viewBox="0 0 16 16" class="bi bi-bar-chart-line-fill" fill="#fff" xmlns="http://www.w3.org/2000/svg">
                              <rect width="4" height="5" x="1" y="10" rx="1"/>
                              <rect width="4" height="9" x="6" y="6" rx="1"/>
                              <rect width="4" height="14" x="11" y="1" rx="1"/>
                              <path fill-rule="evenodd" d="M0 14.5a.5.5 0 0 1 .5-.5h15a.5.5 0 0 1 0 1H.5a.5.5 0 0 1-.5-.5z"/>
                            </svg>
                     </div>
                     <div class="inner ">
                     <h4 class="countNotification" style="color:#333a;">3</h4>
                     <p style="color:#333a;">Texto</p>
                     </div>
                 </div> -->
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-6">
                  <!-- small box -->
                  <!-- <div class="small-box  d-flex" id="smallbox3" >
                      <div class="inner-icon" id="folder-home" >
                          <svg width="5em" height="5em" viewBox="0 0 16 16" class="bi bi-folder-fill" fill="#000000" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" d="M9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.826a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31L.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3zm-8.322.12C1.72 3.042 1.95 3 2.19 3h5.396l-.707-.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139z"/>
                            </svg>
                     </div>
                     <div class="inner ">
                     <h4 class="countNotification" style="color:#333a;">3</h4>
                     <p style="color:#333a;">Texto</p>
                     </div>
                 </div> -->
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-6">
                  <!-- small box -->
                </div>
                <!-- ./col -->
              </div>
              <!-- /.row -->
              <!-- Main row -->
            </div>
          </section>
              <!-- right col -->
            </div>
            <!-- /.row (main row) -->
          </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->


{{--  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Iniciaste sesion!
                </div>
            </div>
        </div>
    </div>
</div>  --}}

</div>

@endsection
