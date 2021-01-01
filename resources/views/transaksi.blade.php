@include('header')
@if ($user['aksesUser']=='admin')
    @include('adminSidebar')
@elseif ($user['aksesUser']=='owner')
    @include('ownerSidebar')
@else
    @include('memberSidebar')
@endif

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Transaksi</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                @foreach ($venue as $v)
                                    <div class="card col-md-3" >
                                        <img class="card-img-top" src="{{ asset('images/venue/'.$v->gambarVenue) }}" alt="Card image">
                                        <div class="card-body">
                                            <h4 class="card-title mb-2">{{ $v->namaVenue }}</h4>
                                            <p class="card-text">
                                                @if ($user['aksesUser']=='admin')
                                                    Owner : {{ $v->namaUser }}<br>
                                                @endif
                                                Alamat : {{ $v->alamatVenue }}<br>
                                                Telfon : {{ $v->telpVenue }}<br>
                                                Email  : {{ $v->emailVenue }}<br>
                                                Jam Buka: {{ $v->bukaVenue }}<br>
                                                Jam Tutup: {{ $v->tutupVenue }}
                                            </p>
                                            <a href="/transaksi/{{ $v->idVenue }}" class="btn btn-success">Detail Transaksi</a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
        <h5>Title</h5>
    <p>Sidebar content</p>
    </div>
</aside>
<!-- /.control-sidebar -->

@include('footer')
