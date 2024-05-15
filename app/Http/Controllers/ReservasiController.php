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
            // 'user_id' => 'required',
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
        $reservasi->user_id = $auth ->user()->id;

        $reservasi->nama = $request->input('nama');
        $reservasi->nama_instansi = $request('nama_instansi');
        $reservasi->nomor_hp = $request('nomor_hp');
        $reservasi->nomor_wa = $request('nomor_wa');
        $reservasi->email = $request('email');
        $reservasi->provinsi = $request('provinsi');
        $reservasi->kota_kabupaten = $request('kota_kabupaten');
        $reservasi->alamat_instansi = $request('alamat_instansi');
        $reservasi->tanggal = $request('tanggal');
        $reservasi->pukul = $request('pukul');
        $reservasi->topik = $request('topik');
        $reservasi->tujuan_opd = $request('tujuan_opd');
        $reservasi->jumlah_rombongan = $request('jumlah_rombongan');
        $reservasi->pimpinan = $request('pimpinan');
        $reservasi->keterangan = $request('keterangan');
        $reservasi->nomor_surat = $request('nomor_surat');
        $reservasi->kepada = $request('kepada');
        $reservasi->surat_permohonan = $request->file('surat_permohonan')->store('surat_permohonan_' . time() . '.' . $request->file('surat_permohonan')->getClientOriginalExtension(), 'public/images');
        $reservasi->is_bukti_inap = $request('is_bukti_inap');

        create($reservasi);

        $reservasi->save();

        return redirect('/reservasi')->with('success', 'Data berhasil di tambahkan!');
    }

}

