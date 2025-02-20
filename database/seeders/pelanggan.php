<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class pelanggan extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Faker = Faker::create();
        $data = [];

        for ($i=0; $i <10 ; $i++) {
            $data[] = [
                'nama_pelanggan' => $Faker->name,
                'telp' => $Faker->numerify($Faker->randomElement([
                    '08##########',
                    '08###########',
                    '08############',
                ])),
                'jenis_kelamin' => $Faker->randomElement([
                    'Laki-Laki','Perempuan'
                ]),
                'alamat' => $Faker->address,
                'kota' => $Faker->city,
                'provinsi' => $Faker->state,
            ];
        }
        DB::table('pelanggans')->insert($data);
    }
}
