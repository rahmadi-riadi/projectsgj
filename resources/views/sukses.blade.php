@extends('layout.frontend.header')

@section('content')
    <div class="main">
        <!-- Header Start -->
        <div class="container-fluid bg-breadcrumb">
            <div class="container text-center py-5" style="max-width: 900px;">
                <h3 class="text-white display-3 mb-4">Reservasi Berhasil</h3>
                <p class="lead text-white">Terima kasih, reservasi Anda telah berhasil diajukan. Kami akan menghubungi Anda
                    untuk langkah selanjutnya.</p>
            </div>
        </div>

        <div class="container-fluid bg-white py-5">
            <div class="container text-center py-5" style="max-width: 900px;">
                <!-- Tampilkan form yang diisi -->
                <div class="mt-4">
                    <h4>Data Formulir yang Diisi</h4>
                    <div class="table-responsive">
                        <table class="table table-vertical">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Nomor HP</th>
                                    <th>Nama Instansi</th>
                                    <th>Nama Tampilkan</th>
                                    <th>Nomor WA</th>
                                    <th>Email</th>
                                    <th>Provinsi</th>
                                    <th>Kota/Kabupaten</th>
                                    <th>Alamat Instansi</th>
                                    <th>Tanggal Reservasi</th>
                                    <th>Jam Berkunjung</th>
                                    <th>Topik</th>
                                    <th>Tujuan OPD</th>
                                    <th>Jumlah Rombongan</th>
                                    <th>No Surat</th>
                                    <th>Kepada</th>
                                    <th>Surat Permohonan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $reservasi->nama }}</td>
                                    <td>{{ $reservasi->nomor_hp }}</td>
                                    <td>{{ $reservasi->nama_instansi }}</td>
                                    <td>{{ $reservasi->nama_tampilkan }}</td>
                                    <td>{{ $reservasi->nomor_wa }}</td>
                                    <td>{{ $reservasi->email }}</td>
                                    <td>{{ $reservasi->provinsi }}</td>
                                    <td>{{ $reservasi->kota_kabupaten }}</td>
                                    <td>{{ $reservasi->alamat_instansi }}</td>
                                    <td>{{ $reservasi->tanggal_reservasi }}</td>
                                    <td>{{ $reservasi->jam_berkunjung }}</td>
                                    <td>{{ $reservasi->topik }}</td>
                                    <td>{{ $reservasi->tujuan_opd }}</td>
                                    <td>{{ $reservasi->jumlah_rombongan }}</td>
                                    <td>{{ $reservasi->no_surat }}</td>
                                    <td>{{ $reservasi->kepada }}</td>
                                    <td>{{ $reservasi->surat_permohonan }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="my-4">
                        <h5 class="text-uppercase">Status :</h5>
                        <div class="d-flex align-items-center">
                            @switch($reservasi->status)
                                @case('pending')
                                    <span class="badge rounded-pill bg-warning text-dark">Pending</span>
                                    @break
                                @case('sukses')
                                    <span class="badge rounded-pill bg-success text-white">Sukses</span>
                                    @break
                                @case('diaga')
                                    <span class="badge rounded-pill bg-danger text-white">Ditolak</span>
                                    @break
                            @endswitch
                        </div>
                    </div>
                    <!-- Akhir tampilan form yang diisi -->

                    <a href="/" class="btn btn-primary rounded-pill">Kembali ke Beranda</a>
                </div>
            </div>

        </div>
    @endsection
