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
                    <h1 class="m-0 text-dark">Venue</h1>
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
                            @if ($user['aksesUser']=='owner')
                                <!-- MODAL TAMBAH VENUE-->
                                <button class='btn btn-primary mb-3' data-toggle="modal" data-target="#tambahVenue">Tambah Venue</button>
                                <div class="modal fade" id="tambahVenue">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header bg-primary">
                                                <h4 class="modal-title">Tambah Venue</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/venue/insert" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" placeholder="Nama Venue" name="nama">
                                                        <div class="input-group-append">
                                                            <div class="input-group-text">
                                                                <span class="fas fa-user"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" placeholder="Alamat" name="alamat">
                                                        <div class="input-group-append">
                                                            <div class="input-group-text">
                                                                <span class="fas fa-map"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" placeholder="Nomor Telfon" name="telp">
                                                        <div class="input-group-append">
                                                            <div class="input-group-text">
                                                                <span class="fas fa-phone"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" placeholder="Email" name="email">
                                                        <div class="input-group-append">
                                                            <div class="input-group-text">
                                                                <span class="fas fa-envelope"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <input type="time" class="form-control" name="buka">
                                                        <div class="input-group-append">
                                                            <div class="input-group-text">
                                                                <span class="fas fa-clock"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <input type="time" class="form-control" name="tutup">
                                                        <div class="input-group-append">
                                                            <div class="input-group-text">
                                                                <span class="fas fa-clock"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <input type="file" class="form-control" name="gambar" accept="image/*">
                                                        <div class="input-group-append">
                                                            <div class="input-group-text">
                                                                <span class="fas fa-image"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- / MODAL TAMBAH VENUE -->
                            @endif
                            @include('flash-message')
                            <div class="row">
                                @foreach($venue as $v)
                                    <div class="card col-md-3" >
                                        <img class="card-img-top" src="{{ asset('images/'.$v->gambarVenue) }}" alt="Card image">
                                        <div class="card-body">
                                            <h4 class="card-title mb-2">{{ $v->namaVenue }}</h4>
                                            <p class="card-text">
                                                Owner : {{ $v->namaUser }}<br>
                                                Alamat : {{ $v->alamatVenue }}<br>
                                                Telfon : {{ $v->telpVenue }}<br>
                                                Email  : {{ $v->emailVenue }}<br>
                                                Jam Buka: {{ $v->bukaVenue }}<br>
                                                Jam Tutup: {{ $v->tutupVenue }}
                                            </p>
                                            <a href="/venue/lapangan/{{ $v->idVenue }}" class="btn btn-success">Detail</a>
                                            @if ($user['aksesUser']=='owner')
                                                <a href="/venue/delete/{{ $v->idVenue }}" class="btn btn-danger">Hapus</a>
                                            @endif
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
