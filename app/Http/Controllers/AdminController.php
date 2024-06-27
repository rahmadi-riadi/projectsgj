<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Reservasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // Method untuk menampilkan halaman dashboard admin
    public function index()
    {
        $reservasis = Reservasi::all();

        return view('admin.index', [
            'title' => 'Dashboard',
            'reservasis' => $reservasis,
        ]);
    }

    // Method untuk menampilkan halaman posts
    public function posts()
    {
        return view('admin.posts', [
            'title' => 'Posts',
        ]);
    }

    // Method untuk menampilkan halaman wisata
    public function wisata()
    {
        return view('admin.wisata', [
            'title' => 'Wisata',
        ]);
    }

    // Method untuk menampilkan halaman agenda
    public function agenda()
    {
        return view('admin.agenda', [
            'title' => 'Agenda',
        ]);
    }

    // Method untuk menampilkan daftar admin
    public function setadmin()
    {
        $admins = Admin::all();
        return view('admin.setadmin', compact('admins'));
    }

    // Method untuk menampilkan form tambah admin
    public function createAdmin()
    {
        return view('admin.create');
    }

    // Method untuk menyimpan admin baru ke dalam database
    public function storeAdmin(Request $request)
    {
        $request->validate([
            'name' => 'required|string|in:superadmin,admin',
            'email' => 'required|string|email|max:255|unique:admins,email',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'password.required' => 'Password is required.',
            'password.string' => 'Password must be a string.',
            'password.min' => 'Password must be at least :min characters long.',
            'password.confirmed' => 'Password confirmation does not match.',
        ]);

        // Simpan admin baru ke dalam database
        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.setadmin')->with('success', 'Admin created successfully.');
    }

    // Method untuk menampilkan form edit admin
    public function editAdmin(Admin $admin)
    {
        return view('admin.edit', compact('admin'));
    }

    // Method untuk memperbarui informasi admin
    public function updateAdmin(Request $request, Admin $admin)
    {
        $request->validate([
            'name' => 'required|string|in:superadmin,admin',
            'email' => 'required|string|email|max:255|unique:admins,email,' . $admin->id,
            'password' => 'nullable|string|min:8|confirmed',
        ], [
            'password.string' => 'Password must be a string.',
            'password.min' => 'Password must be at least :min characters long.',
            'password.confirmed' => 'Password confirmation does not match.',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        // Jika password baru diisi, tambahkan ke data yang akan diupdate
        if (!empty($request->password)) {
            $data['password'] = Hash::make($request->password);
        }

        $admin->update($data);

        return redirect()->route('admin.setadmin')->with('success', 'Admin updated successfully.');
    }

    // Method untuk menghapus admin
    public function destroyAdmin(Admin $admin)
    {
        $admin->delete();
        return redirect()->route('admin.setadmin')->with('success', 'Admin deleted successfully.');
    }

    // Method untuk menampilkan daftar reservasi
    public function reservasiIndex()
    {
        $reservasis = Reservasi::all();
        return view('admin.reservasi.index', compact('reservasis'));
    }

    // Method untuk menampilkan form tambah reservasi
    public function reservasiCreate()
    {
        $reservasi = new Reservasi(); // Buat objek baru Reservasi

        return view('admin.reservasi.create', compact('reservasi'));
    }

    // Method untuk menyimpan reservasi baru ke dalam database
    public function reservasiStore(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nama_instansi' => 'required|string|max:255',
            'nomor_hp' => 'required|numeric',
            'nomor_wa' => 'required|numeric',
            'email' => 'required|email',
            'provinsi' => 'required|string|max:255',
            'kota_kabupaten' => 'required|string|max:255',
            'alamat_instansi' => 'required|string|max:255',
            'tanggal_reservasi' => 'required|date',
            'jam_berkunjung' => 'required|string|max:255',
            'topik' => 'required|string',
            'tujuan_opd' => 'required|string|max:255',
            'jumlah_rombongan' => 'required|integer',
            'pimpinan_rombongan' => 'nullable|string|max:255',
            'keterangan' => 'nullable|string',
            'no_surat' => 'required|string|max:255',
            'kepada' => 'required|string|max:255',
            'surat_permohonan' => 'required|file|mimes:jpeg,jpg,png,pdf|max:3072',
            'bukti_inap' => 'nullable|file|mimes:jpeg,jpg,png,pdf|max:3072',
        ]);

        $surat_permohonan_path = $request->file('surat_permohonan')->store('surat_permohonan', 'public');
        $bukti_inap_path = $request->hasFile('bukti_inap') ? $request->file('bukti_inap')->store('bukti_inap', 'public') : null;

        $reservasi = Reservasi::create([
            'user_id' => $request->user()->id,
            'nama' => $request->nama,
            'nama_instansi' => $request->nama_instansi,
            'nomor_hp' => $request->nomor_hp,
            'nomor_wa' => $request->nomor_wa,
            'email' => $request->email,
            'provinsi' => $request->provinsi,
            'kota_kabupaten' => $request->kota_kabupaten,
            'alamat_instansi' => $request->alamat_instansi,
            'tanggal_reservasi' => $request->tanggal_reservasi,
            'jam_berkunjung' => $request->jam_berkunjung,
            'topik' => $request->topik,
            'tujuan_opd' => $request->tujuan_opd,
            'jumlah_rombongan' => $request->jumlah_rombongan,
            'pimpinan_rombongan' => $request->pimpinan_rombongan,
            'keterangan' => $request->keterangan,
            'no_surat' => $request->no_surat,
            'kepada' => $request->kepada,
            'surat_permohonan' => $surat_permohonan_path,
            'bukti_inap' => $bukti_inap_path,
        ]);

        return redirect()->route('admin.reservasi.index')->with('success', 'Reservasi created successfully.');
    }

    // Method untuk menampilkan form edit reservasi
    public function reservasiEdit($id)
    {
        $reservasi = Reservasi::findOrFail($id);
        return view('admin.reservasi.edit', compact('reservasi'));
    }

    public function reservasiShow($id)
    {
        $reservasi = Reservasi::findOrFail($id);

        return view('admin.reservasi.show', compact('reservasi'));
    }


    // Method untuk memperbarui informasi reservasi
    public function reservasiUpdate(Request $request, $id)
    {
        $reservasi = Reservasi::findOrFail($id);

        $request->validate([
            'nama' => 'required|string',
            'nama_instansi' => 'required|string',
            'nomor_hp' => 'required|string',
            'email' => 'required|email',
            'tanggal_reservasi' => 'required|date',
            'jam_berkunjung' => 'required|string',
            'tujuan_opd' => 'required|string',
            'surat_permohonan' => 'nullable|string',
            'status' => 'required|in:Pending,Sukses,Ditolak',
        ]);

        $reservasi->update($request->all());

        return redirect()->route('admin.reservasi.index')->with('success', 'Reservasi updated successfully.');
    }

    // Method untuk menghapus reservasi
    public function reservasiDestroy($id)
    {
        $reservasi = Reservasi::findOrFail($id);
        $reservasi->delete();

        return redirect()->route('admin.reservasi.index')->with('success', 'Reservasi deleted successfully.');
    }
}
