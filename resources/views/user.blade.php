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
                    <h1 class="m-0 text-dark">Ubah data diri</h1>
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
                            <div class="table-responsive">
                                <table class="table table-condensed">
                                    <tbody>
                                    <tr>
                                        <td class="text-bold">ID User</td>
                                        <td>{{ $user['idUser'] }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-bold">Username</td>
                                        <td>{{ $user['username'] }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-bold">Nama</td>
                                        <td>{{ $user['namaUser'] }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-bold">Nomor Telfon</td>
                                        <td>{{ $user['telpUser'] }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-bold">Email</td>
                                        <td>{{ $user['emailUser'] }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-bold">Akses</td>
                                        <td>{{ $user['aksesUser'] }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <button class="btn btn-success" data-toggle="modal" data-target="#ubahUser">Ubah Detail User</button>
                                <div class="modal fade" id="ubahUser">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header bg-success">
                                                <h4 class="modal-title">Ubah detail user</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/user/update/{{ $user['idUser'] }}" method="post"> @csrf
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" value="{{ $user['username'] }}" name="username" required>
                                                        <div class="input-group-append">
                                                            <div class="input-group-text">
                                                                <span class="fas fa-user"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" value="{{ $user['namaUser'] }}" name="nama" required>
                                                        <div class="input-group-append">
                                                            <div class="input-group-text">
                                                                <span class="fas fa-user"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" value="{{ $user['telpUser'] }}" name="telp" required>
                                                        <div class="input-group-append">
                                                            <div class="input-group-text">
                                                                <span class="fas fa-phone"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" value="{{ $user['emailUser'] }}" name="email" required>
                                                        <div class="input-group-append">
                                                            <div class="input-group-text">
                                                                <span class="fas fa-envelope"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <input type="password" class="form-control" placeholder="Password" name="password" required>
                                                        <div class="input-group-append">
                                                            <div class="input-group-text">
                                                                <span class="fas fa-hashtag"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <input type="password" class="form-control" placeholder="Confirm Password" name="Cpassword" required>
                                                        <div class="input-group-append">
                                                            <div class="input-group-text">
                                                                <span class="fas fa-hashtag"></span>
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
