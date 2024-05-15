@extends('layout.maindash')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Welcome back</h1>
    </div>

    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Pendaftar</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">1592</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Peserta Pending</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">123</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-clock fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Peserta Sukses</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">7897</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-check fa-2x text-gray-300"></i>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Jumlah Total Masuk</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">456</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-plus fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Permohonan Kunjungan</h1>
    </div>

    <div class="card-body">
        <div class="table-responsive">

            <table class="table table-bordered table-striped table-hover datatable" id="table-reservasi">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">NO.</th>
                        <th scope="col" class="text-center">Nama</th>
                        <th scope="col" class="text-center">Nama Instansi</th>
                        <th scope="col" class="text-center">Nomor HP</th>
                        <th scope="col" class="text-center">Email</th>
                        <th scope="col" class="text-center">Tanggal</th>
                        <th scope="col" class="text-center">Pukul</th>
                        <th scope="col" class="text-center">Tujuan</th>
                        <th scope="col" class="text-center">Surat Permohonan</th>
                        <th scope="col" class="text-center">Status</th>
                        <th scope="col" class="text-center" width="10%">Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($reservasis ?? [] as $reservasi)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $reservasi->nama }}</td>
                            <td>{{ $reservasi->nama_instansi }}</td>
                            <td>{{ $reservasi->nomor_hp }}</td>
                            <td>{{ $reservasi->email }}</td>
                            <td>{{ $reservasi->tanggal }}</td>
                            <td>{{ $reservasi->pukul }}</td>
                            <td>{{ $reservasi->tujuan }}</td>
                            <td>{{ $reservasi->surat_permohonan }}</td>
                            <td>{{ $reservasi->status }}</td>
                            <td class="text-center">


                                <form action="{{ route('reservasi.destroy', $reservasi->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        Hapus
                                    </button>
                                </form>
                                <a href="{{ route('reservasi.pending', $reservasi->id) }}" class="btn btn-warning btn-sm">
                                    Pending
                                </a>
                                <a href="{{ route('reservasi.success', $reservasi->id) }}" class="btn btn-success btn-sm">
                                    Sukses
                                </a>
                                <a href="{{ route('reservasi.edit', $reservasi->id) }}" class="btn btn-primary btn-sm">
                                    Edit
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#table-reservasi').DataTable();
        });
    </script>
@endsection
