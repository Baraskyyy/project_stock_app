<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class suplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Faker = Faker::create();
        $data = [];

        for ($i=0; $i <10 ; $i++) {
            $nama_suplier = 'PT. ' . $Faker->company;
            $data[] = [
                'nama_suplier' => $nama_suplier,
                'email' => 'admin.'  . strtolower(str_replace(' ','_', $nama_suplier)) . '@admin.com',
                'alamat' => $Faker->address,
                'telp' => $Faker->numerify($Faker->randomElement([
                    '08##########',
                    '08###########',
                    '08############',
                ])),
                'tgl_terdaftar' => $Faker->date($format = 'Y-m-d', $max = 'now'),
                'status'    => 'Aktif',
            ];

        }
        DB::table('supliers')->insert($data);
    }
}
