@extends('layouts.main')

@section('content')
<!-- Card Edit Profil -->
<div class="container mt-5">
    <div class="card shadow-lg rounded">
        <div class="card-header text-center">
            <h5>Edit Profil</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('update-profile') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" value="{{ $pengguna->username }}" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $pengguna->email }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="nohp" class="form-label">No HP</label>
                    <input type="text" class="form-control" id="nohp" name="nohp" value="{{ $pengguna->nohp }}" required>
                </div>
                <div class="d-flex justify-content-between">
                    <a href="/detailpelanggan" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<br>
@endsection
