<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Halaman Pendaftaran Pemohon</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/asset/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="/asset/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/asset/dist/css/adminlte.min.css">
</head>

<body class="hold-transition register-page">
    <div class="content"style="padding: 50px">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
            <a href="#" class="h1"><b>Registrasi</b> Admin Desa</a>
            </div>
            <div class="card-body">
                <form id="registrationForm" action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nik">NIK</label>
                                <input type="text" class="form-control" id="nik" name="nik" required autofocus maxlength="16">
                                <small id="nikWarning" class="form-text text-muted"></small>
                            </div>
                            <div class="form-group">
                                <label for="name">Nama Lengkap</label>
                                <input type="text" class="form-control" id="name" name="nama" required>
                            </div>
                            <div class="form-group">
                                <label for="jekel">Jenis Kelamin</label>
                                <select class="form-control" id="jekel" name="jekel" required>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tgl_lahir">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kota">Kota</label>
                                <input type="text" class="form-control" id="kota" name="kota" value="Jember" readonly>
                            </div>
                            <div class="form-group">
                                <label for="kecamatan">Kecamatan</label>
                                <select class="form-control" id="kecamatan" name="kecamatan" required>
                                    <option value="">Pilih Kecamatan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="desa">Desa</label>
                                <select class="form-control" id="desa" name="desa" required>
                                    <option value="">Pilih Desa</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="password" name="password" required pattern="(?=.*\d)(?=.*[A-Z]).{8,}" title="Password harus mengandung setidaknya satu angka, satu huruf besar, dan setidaknya 8 karakter">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Daftar</button>
                </form>
                <div class="text-center mt-4 font-weight-light">
                    Sudah memiliki akun? <a href="/login" class="text-primary">Login</a>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.register-box -->

    <!-- jQuery -->
    <script src="/asset/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/asset/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/asset/dist/js/adminlte.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#nik').on('input', function(){
                var nikLength = $(this).val().length;
                if(nikLength < 16){
                    $('#nikWarning').text('NIK harus terdiri dari 16 digit').addClass('text-danger');
                }else{
                    $('#nikWarning').text('').removeClass('text-danger');
                }
            });
        });
    </script>
    <script>
        $(document).ready(function(){
            $('#togglePassword').on('click', function(){
                var passwordInput = $('#password');
                var passwordFieldType = passwordInput.attr('type');
                if(passwordFieldType === 'password'){
                    passwordInput.attr('type', 'text');
                    $(this).html('<i class="fas fa-eye-slash"></i>');
                }else{
                    passwordInput.attr('type', 'password');
                    $(this).html('<i class="fas fa-eye"></i>');
                }
            });
        });
    </script>

    <script>
        $(document).ready(function(){
            $.get("/kecamatan", function(data){
                $.each(data, function(index, kecamatan){
                    $('#kecamatan').append('<option value="'+kecamatan.id+'">'+kecamatan.nama+'</option>');
                });
            });
            $('#kecamatan').change(function(){
                var id_kec = $(this).val();
                $('#desa').empty();
                $('#desa').append('<option value="">Pilih Desa</option>');
                $.get("/desa/"+id_kec, function(data){
                    $.each(data, function(index, desa){
                        $('#desa').append('<option value="'+desa.id+'">'+desa.nama+'</option>');
                    });
                });
            });
        });
    </script>
</body>

</html>
