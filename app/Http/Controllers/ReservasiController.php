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
        // Validate the incoming request data
        $validatedData = $request->validate([
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
            'surat_permohonan' => 'required|file|mimes:jpeg,jpg,png,pdf|max:2048',
            'is_bukti_inap' => 'required',
        ]);

        // Create a new Reservasi instance
        $reservasi = new Reservasi();
        $reservasi->user_id = auth()->user()->id; // Assuming the user is authenticated

        // Assign validated request data to the Reservasi instance
        $reservasi->nama = $request->input('nama');
        $reservasi->nama_instansi = $request->input('nama_instansi');
        $reservasi->nomor_hp = $request->input('nomor_hp');
        $reservasi->nomor_wa = $request->input('nomor_wa');
        $reservasi->email = $request->input('email');
        $reservasi->provinsi = $request->input('provinsi');
        $reservasi->kota_kabupaten = $request->input('kota_kabupaten');
        $reservasi->alamat_instansi = $request->input('alamat_instansi');
        $reservasi->tanggal = $request->input('tanggal');
        $reservasi->pukul = $request->input('pukul');
        $reservasi->topik = $request->input('topik');
        $reservasi->tujuan_opd = $request->input('tujuan_opd');
        $reservasi->jumlah_rombongan = $request->input('jumlah_rombongan');
        $reservasi->pimpinan = $request->input('pimpinan');
        $reservasi->keterangan = $request->input('keterangan');
        $reservasi->nomor_surat = $request->input('nomor_surat');
        $reservasi->kepada = $request->input('kepada');

        // Handle file upload for surat_permohonan
        if ($request->hasFile('surat_permohonan')) {
            $file = $request->file('surat_permohonan');
            $filePath = $file->store('surat_permohonan', 'public');
            $reservasi->surat_permohonan = $filePath;
        }

        $reservasi->is_bukti_inap = $request->input('is_bukti_inap');

        // Use dd() to debug the Reservasi instance
        dd($reservasi);

        // Save the Reservasi instance to the database
        $reservasi->save();

        // Redirect to the reservasi route with a success message
        return redirect('/reservasi/form');
    }

    public function update(Request $request, Reservasi $reservasi){

    }

}

