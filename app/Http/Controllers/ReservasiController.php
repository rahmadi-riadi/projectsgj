<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReservasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('reservasi', [
            'title' => 'reservasi',
            // 'active' => 'login'
        ]);
    }

    public function viewForm()
    {
        return view('form', [
            'title' => 'Formulir Reservasi',
            // 'active' => 'login'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'nama' => 'required',
            'nama_instansi' => 'required',
            'nomor_hp' => 'required',
            'nomor_wa' => 'required',
            'email' => 'required|email',
            'provinsi' => 'required',
            'kota_kabupaten' => 'required',
            'alamat_instansi' => 'required',
            'tanggal' => 'required|date',
            'pukul' => 'required|date_format:H:i',
            'topik' => 'required',
            'tujuan_opd' => 'required',
            'jumlah_rombongan' => 'required|numeric',
            'pimpinan' => 'required',
            'keterangan' => 'required',
            'nomor_surat' => 'required|numeric',
            'kepada' => 'required',
            'surat_permohonan' => 'required|file|image|mimes:1|max:2048',
            'is_bukti_inap' => 'required',
        ]);

        $reservasi = new Reservasi();
        $reservasi->user_id = $validatedData['user_id'];
        $reservasi->nama = $validatedData['nama'];
        $reservasi->nama_instansi = $validatedData['nama_instansi'];
        $reservasi->nomor_hp = $validatedData['nomor_hp'];
        $reservasi->nomor_wa = $validatedData['nomor_wa'];
        $reservasi->email = $validatedData['email'];
        $reservasi->provinsi = $validatedData['provinsi'];
        $reservasi->kota_kabupaten = $validatedData['kota_kabupaten'];
        $reservasi->alamat_instansi = $validatedData['alamat_instansi'];
        $reservasi->tanggal = $validatedData['tanggal'];
        $reservasi->pukul = $validatedData['pukul'];
        $reservasi->topik = $validatedData['topik'];
        $reservasi->tujuan_opd = $validatedData['tujuan_opd'];
        $reservasi->jumlah_rombongan = $validatedData['jumlah_rombongan'];
        $reservasi->pimpinan = $validatedData['pimpinan'];
        $reservasi->keterangan = $validatedData['keterangan'];
        $reservasi->nomor_surat = $validatedData['nomor_surat'];
        $reservasi->kepada = $validatedData['kepada'];
        $reservasi->surat_permohonan = $request->file('surat_permohonan')->store('surat_permohonan_' . time() . '.' . $request->file('surat_permohonan')->getClientOriginalExtension(), 'public/images');
        $reservasi->is_bukti_inap = $validatedData['is_bukti_inap'];

        $reservasi->save();

        return redirect('/reservasi')->with('success', 'Data berhasil di tambahkan!');
    }

}

