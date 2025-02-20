<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class stokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Faker = Faker::create();
        $data = [];
        $areas = [
                'Palembang'     => 'plg',
                'Surabaya'      => 'sby',
                'Jakarta'       => 'jkt',
                'Bandung'       => 'bdg',
                'Lampung'       => 'lmp',
                'papua'         => 'ppa',
        ];
        for ($i=0; $i <10 ; $i++) {
            $randomArea = $Faker->randomElement($areas);
            $data [] = [
                'kode_barang'         => strtoupper($Faker->lexify('???').$Faker->unique()->numerify('##')),
                'nama_barang'         =>  $Faker->word('10',true),
                'harga'               =>  $Faker->numberBetween(1000,1000),
                'stok'                =>  $Faker->numberBetween(10,75),
                'suplier_id'          =>  $Faker->numberBetween(1,10),
                'cabang'              =>  $randomArea,
            ];
        }
        DB::table('stoks')->insert($data);
    }
}
