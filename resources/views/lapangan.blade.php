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
                    <h1 class="m-0 text-dark">Detail Venue</h1>
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
                                <!-- MODAL TAMBAH LAPANGAN-->
                                <button class='btn btn-primary mb-3' data-toggle="modal" data-target="#tambahLapangan">Tambah Lapangan</button>
                                <div class="modal fade" id="tambahLapangan">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header bg-primary">
                                                <h4 class="modal-title">Tambah Lapangan</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/venue/lapangan/{{ $idVenue }}/insert" method="post">
                                                    @csrf
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" placeholder="Nama Lapangan" name="nama">
                                                        <div class="input-group-append">
                                                            <div class="input-group-text">
                                                                <span class="fas fa-user"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" placeholder="Jenis Lapangan" name="jenis">
                                                        <div class="input-group-append">
                                                            <div class="input-group-text">
                                                                <span class="fas fa-futbol"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" placeholder="Harga Lapangan" name="harga">
                                                        <div class="input-group-append">
                                                            <div class="input-group-text">
                                                                <span class="fas fa-tag"></span>
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
                                <!-- / MODAL TAMBAH LAPANGAN -->
                            @endif
                            @include('flash-message')
                            <div class="table-responsive">
                                <table class='table table-condensed'>
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Venue</th>
                                            <th>Lapangan</th>
                                            <th>Jenis Lapangan</th>
                                            <th>Harga</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($lapangan as $l)
                                            <tr>
                                                <td>{{ $l->idLapangan }}</td>
                                                <td>{{ $l->namaVenue }}</td>
                                                <td>{{ $l->namaLapangan }}</td>
                                                <td>{{ $l->jenisLapangan }}</td>
                                                <td>{{ $l->hargaLapangan }}</td>
                                                <td>
                                                    <button class='btn btn-success' data-toggle="modal" data-target="#ubahLapangan{{ $l->idLapangan }}"><i class='fas fa-edit'></i></button>
                                                    <div class="modal fade" id="ubahLapangan{{ $l->idLapangan }}">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header bg-success">
                                                                    <h4 class="modal-title">Ubah detail Lapangan</h4>
                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="/venue/lapangan/{{ $idVenue }}/update/{{ $l->idLapangan }}" method="post">
                                                                        @csrf
                                                                        <div class="input-group mb-3">
                                                                            <input type="text" class="form-control" value="{{ $l->namaLapangan }}" name="nama">
                                                                            <div class="input-group-append">
                                                                                <div class="input-group-text">
                                                                                    <span class="fas fa-user"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="input-group mb-3">
                                                                            <input type="text" class="form-control" value="{{ $l->jenisLapangan }}" name="jenis">
                                                                            <div class="input-group-append">
                                                                                <div class="input-group-text">
                                                                                    <span class="fas fa-futbol"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="input-group mb-3">
                                                                            <input type="text" class="form-control" value="{{ $l->hargaLapangan }}" name="harga">
                                                                            <div class="input-group-append">
                                                                                <div class="input-group-text">
                                                                                    <span class="fas fa-tag"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <button type="submit" class="btn btn-success btn-block btn-flat">Simpan</button>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @if ($user['aksesUser']=='owner')
                                                        <a href="/venue/lapangan/{{ $idVenue }}/delete/{{ $l->idLapangan }}" class='btn btn-danger'><i class='fas fa-trash'></i></a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
