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
                            <div class="table-responsive">
                                <table class='table table-condensed'>
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>ID Transaksi</th>
                                            <th>Lapangan</th>
                                            @if ($user['aksesUser']=='member')
                                                <th>Venue</th>
                                            @endif
                                            <th>Mulai</th>
                                            <th>Selesai</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($transaksi as $t)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $t->idTransaksi }}</td>
                                                <td>{{ $t->namaLapangan }}</td>
                                                @if ($user['aksesUser']=='member')
                                                    <td>{{ $t->namaVenue }}</td>
                                                @endif
                                                <td>{{ $t->mulaiJadwal }}</td>
                                                <td>{{ $t->selesaiJadwal }}</td>
                                                <td>{{ $t->totalTransaksi }}</td>
                                                <td>{{ $t->lunasTransaksi }}</td>
                                                <td>
                                                    @if (!$t->buktiTransaksi)
                                                        @if ($user['aksesUser']!='member' && $t->lunasTransaksi!='lunas')
                                                            <a href="/transaksi{{ $t->idVenue }}}/lunas{{ $t->idTransaksi }}}" class='btn btn-primary'>Lunas</a>
                                                        @else
                                                            <button class='btn btn-success' data-toggle="modal" data-target="#uploadBukti{{ $t->idTransaksi }}"><i class='fas fa-file-upload'></i></button>
                                                            <div class="modal fade" id="uploadBukti{{ $t->idTransaksi }}">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header bg-success">
                                                                            <h4 class="modal-title">Upload Bukti Pembayaran</h4>
                                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form action="/transaksi/bukti/{{ $t->idTransaksi }}" method="post">
                                                                                @csrf
                                                                                <div class="input-group mb-3">
                                                                                    <input type="file" class="form-control" name="bukti" accept="image/*">
                                                                                    <div class="input-group-append">
                                                                                        <div class="input-group-text">
                                                                                            <span class="fas fa-image"></span>
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
                                                        @endif
                                                    @else
                                                        <button class='btn btn-success' data-toggle="modal" data-target="#gambar{{ $t->idTransaksi }}"><i class='fas fa-image'></i></button>
                                                        <div class="modal fade" id="gambar{{ $t->idTransaksi }}">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header bg-success">
                                                                        <h4 class="modal-title">Bukti Pembayaran</h4>
                                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <img src="{{ asset('images/transaksi/'.$t->buktiTransaksi) }}" alt="Bukti Pembayaran">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @if ($user['aksesUser']!='member' && $t->lunasTransaksi!='lunas')
                                                            <a href="/transaksi{{ $t->idVenue }}}/lunas{{ $t->idTransaksi }}}" class='btn btn-primary'>Lunas</a>
                                                        @endif
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
