<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Reservasi;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $user = User::where('name', 'admin')->first();

        if (!$user) {
            $user = User::create([
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('12345'),
                'role' => 'admin',
            ]);
        }

        $reservasi = Reservasi::where('nama', 'rahmadi')->first();

        if (!$reservasi) {
            Reservasi::create([
                'user_id' => $user->id,
                'nama' => 'Rahmadi',
                'nama_instansi' => 'Kantor',
                'nama_tampilkan'=> 'adi',
                'nomor_hp' => '088888888',
                'nomor_wa' => '0502050505',
                'email' => 'email@email.com',
                'provinsi' => 'sulsel',
                'kota_kabupaten' => 'paeprap',
                'alamat_instansi' => 'jalananan',
                'tanggal_reservasi' => now()->format('Y-m-d'),
                'jam_berkunjung' => now()->format('H:i:s'),
                'topik' => 'pemabahasan',
                'tujuan_opd' => 'kantor sana',
                'jumlah_rombongan' => 5,
                'pimpinan_rombongan' => 'bapak ini',
                'keterangan' => 'ada',
                'no_surat' => 1,
                'kepada' => 'walikota',
                'surat_permohonan' => '',
                'is_bukti_inap' => true,


            ]);
        }
    }
}

