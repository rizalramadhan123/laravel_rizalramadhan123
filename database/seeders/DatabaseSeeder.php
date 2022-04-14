<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\DataRumahSakit;
use App\Models\DataPasien;

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
        User::create([
            'name'=>'rizal ramadhan',
            'username'=>'admin',
            'email'=> 'izalr909@gmail.com',
            'password' => bcrypt('password')
        ]);

        DataRumahSakit::create([
            'nama_rumah_sakit'=>'hasan sadikin',
            'alamat'=>'bandung',
            'email'=> 'hasan@gmail.com',
            'telepon'=> '089328316412',
            
        ]);

        DataRumahSakit::create([
            'nama_rumah_sakit'=>'kasih bunda',
            'alamat'=>'cimahi',
            'email'=> 'kasihbunda@gmail.com',
            'telepon'=> '089328316412',
            
        ]);

        DataRumahSakit::create([
            'nama_rumah_sakit'=>'advent',
            'alamat'=>'bandung',
            'email'=> 'advent@gmail.com',
            'telepon'=> '089328316412',
            
        ]);

        DataRumahSakit::create([
            'nama_rumah_sakit'=>'bepas',
            'alamat'=>'bandung',
            'email'=> 'bepas@gmail.com',
            'telepon'=> '089328316412',
            
        ]);

        DataPasien::create([
            'nama_pasien'=>'teguh',
            'alamat'=>'bandung',
            'telepon'=> '089328316412',
            'id_rumah_sakit'=> 1,
            
        ]);

        DataPasien::create([
            'nama_pasien'=>'guntur',
            'alamat'=>'bandung',
            'telepon'=> '089328316412',
            'id_rumah_sakit'=> 2,
            
        ]);

        DataPasien::create([
            'nama_pasien'=>'bambang',
            'alamat'=>'bandung',
            'telepon'=> '089328316412',
            'id_rumah_sakit'=> 3,
            
        ]);
    }
}
