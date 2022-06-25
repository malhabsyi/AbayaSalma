<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.sandbox.google.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('\css\register.css') }}">
</head>
<body>
    <header class="bg-light w-100 pb-2 pt-3 d-flex justify-content-center fixed-top">
        <div class="header-center">
            <a href="{{ route('home') }}">
                <img src="{{ asset('images/abaya-salma-text-logo.png') }}" alt="Logo" width="275"  class="ms-4 ps-2">
            </a>
        </div>
    </header>

    <div class="content-wrapper mt-5 mb-5 pt-5 w-100">
        <div class="content">
            <div class="d-flex justify-content-between">
                <div class="signup">
                    <b>
                        Pelanggan Baru
                    </b>
                </div>
                <div class="signin">
                    <a href="/login">
                        Pelanggan Lama
                    </a>
                </div>
            </div>

            <div class="register-content">
                <div class="facebook-section">
                    <h4 class="text-center">Buat akun</h4>
                    <div class="facebook">
                        <a href="https://www.facebook.com" target="_blank" class="facebook-link">
                            <div class="logo">
                                <img src="{{ asset('images/facebook.png') }}" width="40px">
                            </div>
                            <div class="desc-logo">
                                <p>Lanjutkan dengan Facebook</p>
                            </div>
                        </a>
                    </div>
                    <div class="facebook-desc text-center">
                        <p>Kami tidak akan posting atas nama Anda atau membagikan informasi apapun tanpa persetujuan Anda.</p>
                    </div>
                </div>

                <div class="d-flex align-items-center mb-2">
                    <div class="line w-100">
                        <hr>
                    </div>

                    <div class="header-title pb-1 ps-3 pe-3">
                        <b>atau</b>
                    </div>

                    <div class="line w-100">
                        <hr>
                    </div>
                </div>
                <form action="/registrasi" method="post">
                    @csrf
                    <div class="form-register">
                        <div class="form-input mb-4">
                            <label class="form-label">Alamat Email *</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" required value="{{ old('email') }}" name="email">
                            <span id="error-email"></span>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-input mb-2">
                            <label class="form-label">Password *</label>
                            <input type="password" name="password" class="form-control rounded-buttom @error('password') is-invalid @enderror" id="password" placeholder="Password" required> <span id="seePassword">Tampilkan</span>
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <span id="error-password"></span>
                        </div>

                        <div class="form-input mb-4">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control rounded-top @error('name') is-invalid @enderror" id="name" placeholder="Name" required value="{{ old('name') }}" name="name">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-input mb-4">
                            <label class="form-label">Username</label>
                            <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Username" required value="{{ old('username') }}">
                            @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>


                        <button class="btn-login mt-3 mb-3 p-2 w-100" type="submit">KONFIRMASI DAN LANJUTKAN</button>

                        <p class="syarat">Dengan membuat atau mendaftar akun, Anda menyetujui isi <a href="#">Persyaratan dan Ketentuan</a> & <a href="#">Kebijakan Privasi</a> kami.</p>
                    </div>

                </form>

            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('#seePassword').on('click', function(){
            var x = document.getElementById("password");
            if(x.type === "password"){
                x.type = "text";
                document.getElementById("seePassword").innerHTML = "Sembunyikan";
            }else{
                x.type = "password";
                document.getElementById("seePassword").innerHTML = "Tampilkan";
            }
        });

        $('#email').on('focusout', function(){
            if(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test($('#email').val())){
                $('#error-email').html('');
            }else{
                $('#error-email').html('Masukkan alamat email yang valid (e.g. someone@example.com).');
            }
        });

        $('#password').on('focusout', function(){
            if($('#password').val().length >= 6){
                $('#error-password').html('');
            }else{
                $('#error-password').html('Kata sandi Anda harus setidaknya 6 karakter.');
            }
        });

        $('#gender').on('focusout', function(){
            if($('#gender').val() == "pria" || $('#gender').val() == "wanita"){
                $('#error-gender').html('');
            }else{
                $('#error-gender').html('Pilih jenis kelamin.');
            }
        });

        $('#tanggal').on('focusout', function(){
            if($('#tanggal').val() != " "){
                $('#error-tanggal').html('');
            }else{
                $('#error-tanggal').html('Pilih Tanggal.');
            }

            if($('#bulan').val() != " "){
                $('#error-bulan').html('');
            }else{
                $('#error-bulan').html('Pilih Bulan.');
            }

            if($('#tahun').val() != " "){
                $('#error-tahun').html('');
            }else{
                $('#error-tahun').html('Pilih Tahun.');
            }
        });

        $('#bulan').on('focusout', function(){
            if($('#tanggal').val() != " "){
                $('#error-tanggal').html('');
            }else{
                $('#error-tanggal').html('Pilih Tanggal.');
            }

            if($('#bulan').val() != " "){
                $('#error-bulan').html('');
            }else{
                $('#error-bulan').html('Pilih Bulan.');
            }

            if($('#tahun').val() != " "){
                $('#error-tahun').html('');
            }else{
                $('#error-tahun').html('Pilih Tahun.');
            }
        });

        $('#tahun').on('focusout', function(){
            if($('#tanggal').val() != " "){
                $('#error-tanggal').html('');
            }else{
                $('#error-tanggal').html('Pilih Tanggal.');
            }

            if($('#bulan').val() != " "){
                $('#error-bulan').html('');
            }else{
                $('#error-bulan').html('Pilih Bulan.');
            }

            if($('#tahun').val() != " "){
                $('#error-tahun').html('');
            }else{
                $('#error-tahun').html('Pilih Tahun.');
            }
        });
    </script>
</body>
</html>
