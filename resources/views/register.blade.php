@extends('layouts.main')

@section('content')
<section class="vh-80 mt-5">
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-lg rounded" style="border: none;"> <!-- Gunakan shadow-lg -->
                    <div class="card-body text-center">
                        <img src="{{ asset('images/sayurkeren.png') }}" class="img-fluid mb-1" alt="Sample image" style="width: 45%">
                        <div style="height: 1px; background-color: #0B773D; width: 50%; margin: 10px auto;"></div>
                        <h4 class="mt-1" style="font-family: 'Poppins', sans-serif; font-weight: 600; color: #0B773D;">DAFTAR</h4>

                        <!-- Ubah action ke route register -->
                        <form method="POST" action="/register">
                            @csrf

                            <div class="form-floating mb-2">
                                <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="floatingName" placeholder="Masukkan Nama" value="{{ old('username') }}">
                                <label for="floatingName">Nama Pengguna</label>
                                @error('username')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-floating mb-2">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="floatingEmail" placeholder="name@example.com" value="{{ old('email') }}">
                                <label for="floatingEmail">Email</label>
                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <!-- Ubah ID yang duplikat -->
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control @error('nohp') is-invalid @enderror" name="nohp" id="floatingPhone" placeholder="Masukkan No HP" value="{{ old('nohp') }}">
                                <label for="floatingPhone">No HP</label>
                                @error('nohp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-floating mb-2">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="floatingPassword" placeholder="Password">
                                <label for="floatingPassword">Kata Sandi</label>
                                @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-floating mb-2">
                                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="password-confirm" placeholder="Confirm Password">
                                <label for="floatingPasswordConfirm">Konfirmasi Kata Sandi</label>
                                @error('password_confirmation')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <button class="btn w-100 py-2" type="submit" style="background-color: #0B773D; border-color: #0B773D; color: white;">Daftar</button>
                            <div class="text-center">Sudah punya akun? <a href="/login" style="color: #0B773D;">Masuk</a></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
</section>
@endsection
