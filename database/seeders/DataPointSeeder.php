<?php

namespace Database\Seeders;

use App\Models\DataPoint;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DataPointSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DataPoint::truncate();
        $data = [
            ['kecepatan_maks' => 180, 'konsumsi_bb' => 12, 'tipe_kendaraan' => 'Mobil'],
            ['kecepatan_maks' => 160, 'konsumsi_bb' => 20, 'tipe_kendaraan' => 'Sepeda Motor'],
            ['kecepatan_maks' => 200, 'konsumsi_bb' => 10, 'tipe_kendaraan' => 'Mobil'],
            ['kecepatan_maks' => 150, 'konsumsi_bb' => 25, 'tipe_kendaraan' => 'Sepeda Motor'],
            ['kecepatan_maks' => 170, 'konsumsi_bb' => 15, 'tipe_kendaraan' => 'Mobil'],
            ['kecepatan_maks' => 190, 'konsumsi_bb' => 11, 'tipe_kendaraan' => 'Mobil'],
            ['kecepatan_maks' => 140, 'konsumsi_bb' => 22, 'tipe_kendaraan' => 'Sepeda Motor'],
        ];
        DataPoint::insert($data);
    }
}
