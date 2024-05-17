<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservasi;

class ReservasiController extends Controller
{
    public function store(Request $request)
    {
        // Validasi data reservasi
        $validatedData = $request->validate([
            'nama' => 'required',
            'nama_instansi' => 'required',
            'nama_tampilkan' => 'required',
            'nomor_hp' => 'required',
            'nomor_wa' => 'required',
            'email' => 'required|email',
            'provinsi' => 'required',
            'kota_kabupaten' => 'required',
            'alamat_instansi' => 'required',
            'tanggal_reservasi' => 'required|date',
            'jam_berkunjung' => 'required',
            'topik' => 'required',
            'tujuan_opd' => 'required',
            'jumlah_rombongan' => 'required|numeric',
            'no_surat' => 'required',
            'kepada' => 'required',
            'surat_permohonan' => 'required|file|mimes:jpeg,jpg,png,pdf|max:3072', // maksimum 3MB
        ]);

        // Dapatkan 'user_id' dari pengguna yang sedang masuk
        $userId = Auth::id();

        // Simpan file yang diunggah
        if ($request->hasFile('surat_permohonan')) {
            $filePath = $request->file('surat_permohonan')->store('public/surat_permohonan');
            $validatedData['surat_permohonan'] = $filePath;
        }

        // Tambahkan 'user_id' ke dalam data yang divalidasi
        $validatedData['user_id'] = $userId;

        // Simpan data ke dalam database
        $reservasi = new Reservasi($validatedData);
        $reservasi->save();

        // Redirect ke halaman keterangan sukses dengan ID reservasi
        return redirect()->route('keterangan.sukses', ['id' => $reservasi->id]);
    }

    // Metode lainnya tidak perlu diubah karena tidak terkait langsung dengan penyimpanan 'user_id'
}
