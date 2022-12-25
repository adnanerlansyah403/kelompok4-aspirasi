<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Aspirasi;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // Admin Seeder

        $admins = [
            [
                "nama" => "Admin",
                "email" => "admin@gmail.com",
                "password" => bcrypt('admin'),
                "role" => 1
            ],
            [
                "nama" => "Admin 2",
                "email" => "admin2@gmail.com",
                "password" => bcrypt('admin'),
                "role" => 1
            ]
        ];

        foreach ($admins as $admin) {
            User::create($admin);
        }


        // Masyarakat Seeder

        $masyarakat = [
            [
                "nama" => "Eko Prayoga",
                "email" => "ekoprayoga@gmail.com",
                "password" => bcrypt('12345'),
                "gender" => "laki",
                "tentang" => "Saya adalah pendemo gaji rakyat",
                "nik" => "62169129319",
                "tanggal_lahir" => "2003-03-27",
                "alamat" => "Kp. Harapan Baru RT 01/ RW 09"
            ],
            [
                "nama" => "Asep Setiabudi",
                "email" => "asep@gmail.com",
                "password" => bcrypt('12345'),
                "gender" => "laki",
                "tentang" => "Saya adalah pendemo gaji buruh",
                "nik" => "62169129320",
                "tanggal_lahir" => "2003-03-27",
                "alamat" => "Jl. Cikuduk No.4, Surabaya"
            ],
            [
                "nama" => "Salsabilla",
                "email" => "cecep@gmail.com",
                "password" => bcrypt('12345'),
                "gender" => "perempuan",
                "tentang" => "Saya adalah pendemo gaji petani",
                "nik" => "62169129321",
                "tanggal_lahir" => "2003-03-27",
                "alamat" => "JJl. Cisitu Indah No. 16, Bandung"
            ],
        ];

        foreach ($masyarakat as $m) {
            User::create($m);
        }

        $aspirasis = [
            [
                "id_user" => 3,
                "isi_aspirasi" => "Saya tidak suka dengan cara pembagian gaji dari pemerintah",
                "status" => 0,
            ],
            [
                "id_user" => 4,
                "isi_aspirasi" => "Saya tidak suka dengan cara pembagian sembako dari pemerintah",
                "status" => 0,
            ],
            [
                "id_user" => 5,
                "isi_aspirasi" => "Saya tidak suka dengan cara pemerintah membangun infrastruktur",
                "status" => 0,
            ]
        ];

        foreach ($aspirasis as $aspirasi) {
            Aspirasi::create($aspirasi);
        }
    }
}
