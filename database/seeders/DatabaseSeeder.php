<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Lembaga;
use App\Models\Arsip;
use App\Models\Riwayat;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Create one user
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin1234@example.com',
            'password' => Hash::make('admin1234'),
            'usertype' => 'admin',
        ]);

        $user = User::create([
            'name' => 'User',
            'email' => 'user@contoh.id',
            'password' => Hash::make('user1234'),
            'usertype' => 'user',
        ]);

        // Create 5 lembaga
        $lembagaNames = ['Bagian Hukum', 'Bagian Teknologi', 'Bagian Kesehatan', 'Bagian Transportasi', 'Bagian Pendidikan'];
        foreach ($lembagaNames as $namaLembaga) {
            $lembaga = Lembaga::create([
                'nama_lembaga' => $namaLembaga,
            ]);

            // Generate a prefix for kode_klasifikasi based on lembaga name
            $prefix = strtolower(explode(' ', $namaLembaga)[1]); // Get the second word of nama_lembaga

            // Create 50 arsip entries for each lembaga
            for ($i = 1; $i <= 50; $i++) {
                // Set kode_klasifikasi to repeat every 10 entries
                $kode_klasifikasi = $prefix . '-' . rand(1, 9) . '-' . sprintf('%03d', ($i % 10) + 1);

                $arsip = Arsip::create([
                    'lembaga_id' => $lembaga->lembaga_id,
                    'user_id' => $user->id,
                    'kode_klasifikasi' => $kode_klasifikasi,
                    'nomor_identitas' => rand(1,100) . $i,
                    'uraian_informasi' => 'Informasi arsip ' . $i,
                    'kurun_waktu' => now()->subYears(rand(1, 20)),
                    'jumlah' => rand(1, 100),
                    'jenis_arsip' => collect(['bundel', 'lembar', 'berkas'])->random(),
                    'retensi_aktif' => rand(1, 10),
                    'retensi_inaktif' => rand(1, 10),
                    'kondisi_asli' => rand(0, 1) ? 'Asli' : null,
                    'kondisi_tekstual' => rand(0, 1) ? 'Tekstual' : null,
                    'kondisi_baik' => rand(0, 1) ? 'Baik' : null,
                    'keterangan_lain' => 'Keterangan ' . Str::random(10),
                ]);

                // Create riwayat entry for each arsip
                Riwayat::create([
                    'arsip_id' => $arsip->arsip_id,
                    'user_id' => $user->id,
                    'aksi' => 'Menambahkan arsip',
                    'keterangan' => 'Menambahkan arsip ' . $arsip->uraian_informasi,
                ]);
            }
        }
    }
}