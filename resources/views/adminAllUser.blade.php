@include('header')
@include('adminSidebar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Data User</h1>
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
                            <!-- MODAL TAMBAH USER-->
                            <button class='btn btn-primary' data-toggle="modal" data-target="#tambahUser">Tambah User</button>
                            <div class="modal fade" id="tambahUser">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary">
                                            <h4 class="modal-title">Tambah User</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/allUser/insert" method="post">
                                                @csrf
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" placeholder="Nama" name="nama">
                                                    <div class="input-group-append">
                                                        <div class="input-group-text">
                                                            <span class="fas fa-user"></span>
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
                                                    <input type="text" class="form-control" placeholder="Username" name="username">
                                                    <div class="input-group-append">
                                                        <div class="input-group-text">
                                                            <span class="fas fa-user-lock"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <input type="password" class="form-control" placeholder="Password" name="password">
                                                    <div class="input-group-append">
                                                        <div class="input-group-text">
                                                            <span class="fas fa-lock"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <select class="form-control custom-select" name="akses">
                                                        <option value="member">Member</option>
                                                        <option value="owner">Owner</option>
                                                        <option value="admin">Admin</option>
                                                    </select>
                                                    <div class="input-group-append">
                                                        <div class="input-group-text">
                                                        <span class="fas fa-question-circle"></span>
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
                            <!-- / MODAL TAMBAH USER -->

                            <table class='table table-condensed table-responsive'>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Username</th>
                                        <th>Nama</th>
                                        <th>No. Telp</th>
                                        <th>Email</th>
                                        <th>Akses</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($allUser as $u)
                                    <tr>
                                        <td>{{ $u->idUser }}</td>
                                        <td>{{ $u->username }}</td>
                                        <td>{{ $u->namaUser }}</td>
                                        <td>{{ $u->telpUser }}</td>
                                        <td>{{ $u->emailUser }}</td>
                                        <td>{{ $u->aksesUser }}</td>
                                        <td>
                                            <button class='btn btn-success' data-toggle="modal" data-target="#ubahUser{{ $u->idUser }}"><i class='fas fa-edit'></i></button>
                                            <div class="modal fade" id="ubahUser{{ $u->idUser }}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-success">
                                                            <h4 class="modal-title">Ubah detail User</h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="/allUser/update/{{ $u->idUser }}" method="post">
                                                                @csrf
                                                                <div class="input-group mb-3">
                                                                    <input type="text" class="form-control" value="{{ $u->namaUser }}" required name="nama">
                                                                    <div class="input-group-append">
                                                                        <div class="input-group-text">
                                                                            <span class="fas fa-user"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="input-group mb-3">
                                                                    <input type="text" class="form-control" value="{{ $u->telpUser }}" required name="telp">
                                                                    <div class="input-group-append">
                                                                        <div class="input-group-text">
                                                                            <span class="fas fa-phone"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="input-group mb-3">
                                                                    <input type="text" class="form-control" value="{{ $u->emailUser }}" required name="email">
                                                                    <div class="input-group-append">
                                                                        <div class="input-group-text">
                                                                            <span class="fas fa-envelope"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="input-group mb-3">
                                                                    <input type="text" class="form-control" value="{{ $u->username }}" required name="username">
                                                                    <div class="input-group-append">
                                                                        <div class="input-group-text">
                                                                            <span class="fas fa-user-lock"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="input-group mb-3">
                                                                    <input type="password" class="form-control" placeholder="Password" required name="password">
                                                                    <div class="input-group-append">
                                                                        <div class="input-group-text">
                                                                            <span class="fas fa-hashtag"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="input-group mb-3">
                                                                    <input type="password" class="form-control" placeholder="Confirm Password" required name="Cpassword">
                                                                    <div class="input-group-append">
                                                                        <div class="input-group-text">
                                                                            <span class="fas fa-hashtag"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="input-group mb-3">
                                                                    <select class="form-control custom-select" required name="akses">
                                                                        <option value="member">Member</option>
                                                                        <option value="owner">Owner</option>
                                                                        <option value="admin">Admin</option>
                                                                    </select>
                                                                    <div class="input-group-append">
                                                                        <div class="input-group-text">
                                                                        <span class="fas fa-question-circle"></span>
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
                                            @unless ($u->aksesUser == 'admin')
                                                <a href="/allUser/delete/{{ $u->idUser }}" class='btn btn-danger'>
                                                    <i class='fas fa-trash'></i>
                                                </a>
                                            @endunless
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
