<!-- resources/views/admin/reservasi/create.blade.php -->

@extends('layout.maindash')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h1 class="h2">Form Reservasi Baru</h1>
    </div>

    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('admin.reservasi.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nama">Nama:</label>
                    <input type="text" id="nama" name="nama" class="form-control" value="{{ old('nama', $reservasi->nama) }}">
                </div>
                <!-- Tambahkan input lainnya sesuai kebutuhan -->

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection
