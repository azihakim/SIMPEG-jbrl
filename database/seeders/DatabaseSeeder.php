<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Absensi;
use App\Models\Karyawan;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // Absensi::create([
        //     'user_id' => 1,
        //     'lokasi' => 'palembang',
        //     'jenis' => 'masuk',
        //     'foto' => 'foto-1619784471.jpg',
        //     'created_at' => '2024-01-01 08:00:00'
        // ]);
        // Absensi::create([
        //     'user_id' => 1,
        //     'lokasi' => 'palembang',
        //     'jenis' => 'masuk',
        //     'foto' => 'foto-1619784471.jpg',
        //     'created_at' => '2024-01-15 08:00:00'
        // ]);

        User::create([
            'name' => 'admin',
            'username' => 'admin',
            'role' => 'admin',
            'alamat' => 'palembang',
            'telepon' => '081234567890',
            'password' => '123'
        ]);

        // User::create([
        //     'name' => 'pelamar',
        //     'username' => 'pelamar',
        //     'role' => 'pelamar',
        //     'alamat' => 'palembang',
        //     'telepon' => '081234567890',
        //     'password' => '123'
        // ]);

        User::create([
            'name' => 'karyawan',
            'username' => 'karyawan',
            'role' => 'karyawan',
            'alamat' => 'palembang',
            'telepon' => '081234567890',
            'password' => '123'
        ]);

        User::create([
            'name' => 'manajer',
            'username' => 'manajer',
            'role' => 'manajer',
            'alamat' => 'palembang',
            'telepon' => '081234567890',
            'password' => '123'
        ]);

        Karyawan::create([
            'user_id' => 1,
            'status' => 'Aktif',
            'agama' => 'Islam',
            'jenis_kelamin' => 'Laki-laki',
            'nik' => '1234567890',
            'tgl_masuk' => '2021-01-01',
            'pendidikan_terakhir' => 'SMA',
            'jabatan' => 'Admin',
        ]);
        Karyawan::create([
            'user_id' => 2,
            'status' => 'Aktif',
            'agama' => 'Islam',
            'jenis_kelamin' => 'Laki-laki',
            'nik' => '1234567890',
            'tgl_masuk' => '2021-01-01',
            'pendidikan_terakhir' => 'SMA',
            'jabatan' => 'Karyawan',
        ]);
        Karyawan::create([
            'user_id' => 3,
            'status' => 'Aktif',
            'agama' => 'Islam',
            'jenis_kelamin' => 'Laki-laki',
            'nik' => '1234567890',
            'tgl_masuk' => '2021-01-01',
            'pendidikan_terakhir' => 'SMA',
            'jabatan' => 'Manajer',
        ]);


        User::create([
            'name' => 'Muhammad Hatta',
            'username' => 'hatta',
            'role' => 'karyawan',
            'alamat' => 'palembang',
            'telepon' => '081234567890',
            'password' => '123'
        ]);

        Karyawan::create([
            'user_id' => 4,
            'status' => 'Aktif',
            'agama' => 'Islam',
            'jenis_kelamin' => 'Laki-laki',
            'nik' => '1234567890',
            'tgl_masuk' => '2021-01-01',
            'pendidikan_terakhir' => 'SMA',
            'jabatan' => 'Kabag. SDM, Umum & Pengaduan',
        ]);

        User::create([
            'name' => 'Jefri Siagian',
            'username' => 'siagian',
            'role' => 'karyawan',
            'alamat' => 'palembang',
            'telepon' => '081234567890',
            'password' => '123'
        ]);

        Karyawan::create([
            'user_id' => 5,
            'status' => 'Aktif',
            'agama' => 'Islam',
            'jenis_kelamin' => 'Laki-laki',
            'nik' => '1234567890',
            'tgl_masuk' => '2021-01-01',
            'pendidikan_terakhir' => 'SMA',
            'jabatan' => 'Kabag. SDM, Umum & Pengaduan',
        ]);

        User::create([
            'name' => 'Ricky PB. Manurung',
            'username' => 'ricky',
            'role' => 'karyawan',
            'alamat' => 'palembang',
            'telepon' => '081234567890',
            'password' => '123'
        ]);

        Karyawan::create([
            'user_id' => 6,
            'status' => 'Aktif',
            'agama' => 'Islam',
            'jenis_kelamin' => 'Laki-laki',
            'nik' => '1234567890',
            'tgl_masuk' => '2021-01-01',
            'pendidikan_terakhir' => 'SMA',
            'jabatan' => 'Kabag. Aka & Keuangan',
        ]);

        User::create([
            'name' => 'Candrafarisandy',
            'username' => 'candrafarisandy',
            'role' => 'karyawan',
            'alamat' => 'palembang',
            'telepon' => '081234567890',
            'password' => '123'
        ]);

        Karyawan::create([
            'user_id' => 7,
            'status' => 'Aktif',
            'agama' => 'Islam',
            'jenis_kelamin' => 'Laki-laki',
            'nik' => '1234567890',
            'tgl_masuk' => '2021-01-01',
            'pendidikan_terakhir' => 'SMA',
            'jabatan' => 'Kabag. Aka & Keuangan',
        ]);

        User::create([
            'name' => 'Mahmud Riyadi',
            'username' => 'riyadi',
            'role' => 'karyawan',
            'alamat' => 'palembang',
            'telepon' => '081234567890',
            'password' => '123'
        ]);

        Karyawan::create([
            'user_id' => 8,
            'status' => 'Aktif',
            'agama' => 'Islam',
            'jenis_kelamin' => 'Laki-laki',
            'nik' => '1234567890',
            'tgl_masuk' => '2021-01-01',
            'pendidikan_terakhir' => 'SMA',
            'jabatan' => 'Kabag. Sekper',
        ]);

        User::create([
            'name' => 'Edy Frouza',
            'username' => 'edy',
            'role' => 'karyawan',
            'alamat' => 'palembang',
            'telepon' => '081234567890',
            'password' => '123'
        ]);

        Karyawan::create([
            'user_id' => 9,
            'status' => 'Aktif',
            'agama' => 'Islam',
            'jenis_kelamin' => 'Laki-laki',
            'nik' => '1234567890',
            'tgl_masuk' => '2021-01-01',
            'pendidikan_terakhir' => 'SMA',
            'jabatan' => 'Kabag. Sekper',
        ]);

        User::create([
            'name' => 'Suhendi',
            'username' => 'suhendi',
            'role' => 'karyawan',
            'alamat' => 'palembang',
            'telepon' => '081234567890',
            'password' => '123'
        ]);

        Karyawan::create([
            'user_id' => 10,
            'status' => 'Aktif',
            'agama' => 'Islam',
            'jenis_kelamin' => 'Laki-laki',
            'nik' => '1234567890',
            'tgl_masuk' => '2021-01-01',
            'pendidikan_terakhir' => 'SMA',
            'jabatan' => 'Kabag. SPI',
        ]);

        User::create([
            'name' => 'Zulfikri',
            'username' => 'zulfikri',
            'role' => 'karyawan',
            'alamat' => 'palembang',
            'telepon' => '081234567890',
            'password' => '123'
        ]);

        Karyawan::create([
            'user_id' => 11,
            'status' => 'Aktif',
            'agama' => 'Islam',
            'jenis_kelamin' => 'Laki-laki',
            'nik' => '1234567890',
            'tgl_masuk' => '2021-01-01',
            'pendidikan_terakhir' => 'SMA',
            'jabatan' => 'Kabag. SPI',
        ]);

        User::create([
            'name' => 'Aldison',
            'username' => 'aldison',
            'role' => 'karyawan',
            'alamat' => 'palembang',
            'telepon' => '081234567890',
            'password' => '123'
        ]);

        Karyawan::create([
            'user_id' => 12,
            'status' => 'Aktif',
            'agama' => 'Islam',
            'jenis_kelamin' => 'Laki-laki',
            'nik' => '1234567890',
            'tgl_masuk' => '2021-01-01',
            'pendidikan_terakhir' => 'SMA',
            'jabatan' => 'Kabag. Tanaman',
        ]);

        User::create([
            'name' => 'Gunadi',
            'username' => 'gunadi',
            'role' => 'karyawan',
            'alamat' => 'palembang',
            'telepon' => '081234567890',
            'password' => '123'
        ]);

        Karyawan::create([
            'user_id' => 13,
            'status' => 'Aktif',
            'agama' => 'Islam',
            'jenis_kelamin' => 'Laki-laki',
            'nik' => '1234567890',
            'tgl_masuk' => '2021-01-01',
            'pendidikan_terakhir' => 'SMA',
            'jabatan' => 'Kabag. Tanaman',
        ]);

        User::create([
            'name' => 'Agusman',
            'username' => 'agusman',
            'role' => 'karyawan',
            'alamat' => 'palembang',
            'telepon' => '081234567890',
            'password' => '123'
        ]);

        Karyawan::create([
            'user_id' => 14,
            'status' => 'Aktif',
            'agama' => 'Islam',
            'jenis_kelamin' => 'Laki-laki',
            'nik' => '1234567890',
            'tgl_masuk' => '2021-01-01',
            'pendidikan_terakhir' => 'SMA',
            'jabatan' => 'Kabag. Tehnik & Teknologi',
        ]);

        User::create([
            'name' => 'Budiono. WP',
            'username' => 'budiono',
            'role' => 'karyawan',
            'alamat' => 'palembang',
            'telepon' => '081234567890',
            'password' => '123'
        ]);

        Karyawan::create([
            'user_id' => 15,
            'status' => 'Aktif',
            'agama' => 'Islam',
            'jenis_kelamin' => 'Laki-laki',
            'nik' => '1234567890',
            'tgl_masuk' => '2021-01-01',
            'pendidikan_terakhir' => 'SMA',
            'jabatan' => 'Kabag. Tehnik & Teknologi',
        ]);

        User::create([
            'name' => 'Priyanto',
            'username' => 'priyanto',
            'role' => 'karyawan',
            'alamat' => 'palembang',
            'telepon' => '081234567890',
            'password' => '123'
        ]);

        Karyawan::create([
            'user_id' => 16,
            'status' => 'Aktif',
            'agama' => 'Islam',
            'jenis_kelamin' => 'Laki-laki',
            'nik' => '1234567890',
            'tgl_masuk' => '2021-01-01',
            'pendidikan_terakhir' => 'SMA',
            'jabatan' => 'Kabag. Keamanan',
        ]);

        User::create([
            'name' => 'Hernidi',
            'username' => '',
            'role' => 'karyawan',
            'alamat' => 'palembang',
            'telepon' => '081234567890',
            'password' => '123'
        ]);

        Karyawan::create([
            'user_id' => 17,
            'status' => 'Aktif',
            'agama' => 'Islam',
            'jenis_kelamin' => 'Laki-laki',
            'nik' => '1234567890',
            'tgl_masuk' => '2021-01-01',
            'pendidikan_terakhir' => 'SMA',
            'jabatan' => 'Kabag. Keamanan',
        ]);

        User::create([
            'name' => 'Ismail',
            'username' => 'ismail',
            'role' => 'karyawan',
            'alamat' => 'palembang',
            'telepon' => '081234567890',
            'password' => '123'
        ]);

        Karyawan::create([
            'user_id' => 18,
            'status' => 'Aktif',
            'agama' => 'Islam',
            'jenis_kelamin' => 'Laki-laki',
            'nik' => '1234567890',
            'tgl_masuk' => '2021-01-01',
            'pendidikan_terakhir' => 'SMA',
            'jabatan' => 'Kabag. Kebersihan',
        ]);

        User::create([
            'name' => 'Anlok',
            'username' => 'anlok',
            'role' => 'karyawan',
            'alamat' => 'palembang',
            'telepon' => '081234567890',
            'password' => '123'
        ]);

        Karyawan::create([
            'user_id' => 19,
            'status' => 'Aktif',
            'agama' => 'Islam',
            'jenis_kelamin' => 'Laki-laki',
            'nik' => '1234567890',
            'tgl_masuk' => '2021-01-01',
            'pendidikan_terakhir' => 'SMA',
            'jabatan' => 'Kabag. Kebersihan',
        ]);
    }
}
