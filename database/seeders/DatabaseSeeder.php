<?php

namespace Database\Seeders;

use App\Models\Siswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\User::factory(10)->create();
        Siswa::create([
            'Nama' => 'Helsa Nesta Dhaifullah',
            'NRP' => '5025201005',
            'Semester' => '4',
            'Jurusan' => 'Teknik Informatika',
            'IPK' => '3.99'
        ]);

    }
}
