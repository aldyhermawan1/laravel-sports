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
                    @if ($user['aksesUser']!='member')
                        <h1 class="m-0 text-dark">Jadwal</h1>
                    @else
                        <h1 class="m-0 text-dark">Pemesanan</h1>
                    @endif
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
                            @include('flash-message')
                            <!-- MODAL TAMBAH PESANAN-->
                            @if ($user['aksesUser']=='member')
                                <button class='btn btn-primary' data-toggle="modal" data-target="#tambahPesanan">Pesan</button>
                            @endif
                            <div class="modal fade" id="tambahPesanan">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary">
                                            <h4 class="modal-title">Pemesanan</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/pesan/{{ $idVenue }}/insert" method="post">
                                                @csrf
                                                <div class="input-group mb-3">
                                                    <select class="form-control custom-select" required name="lapangan">
                                                        @foreach ($lapangan as $l)
                                                            <option value="{{ $l->namaLapangan }}">{{ $l->namaLapangan }}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="input-group-append">
                                                        <div class="input-group-text">
                                                        <span class="fas fa-futbol"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <input type="datetime-local" class="form-control" required name="mulai">
                                                    <div class="input-group-append">
                                                        <div class="input-group-text">
                                                            <span class="fas fa-clock"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <input type="number" class="form-control" placeholder="durasi jam" required name="durasi">
                                                    <div class="input-group-append">
                                                        <div class="input-group-text">
                                                            <span class="fas fa-stopwatch"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn-primary btn-block btn-flat">Pesan</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- / MODAL TAMBAH PESANAN -->
                            <div class="table-responsive">
                                <table class='table table-condensed'>
                                    <thead>
                                        <tr>
                                            <th>Lapangan</th>
                                            <th>Mulai</th>
                                            <th>Selesai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($jadwal as $j)
                                        <tr>
                                            <td>{{ $j->namaLapangan }}</td>
                                            <td>{{ $j->mulaiJadwal }}</td>
                                            <td>{{ $j->selesaiJadwal }}</td>
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
