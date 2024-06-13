<?php

namespace App\Http\Controllers;

use App\Models\DataPoint;
use Illuminate\Http\Request;

class KNNController extends Controller
{
    public function classify(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('pages.classify');
        }

        $k = $request->input('k', 3); // default k = 3
        $kecepatan_maks = $request->input('kecepatan_maks');
        $konsumsi_bb = $request->input('konsumsi_bb');

        // Ambil semua data point dari database
        $dataPoints = DataPoint::all();

        // Hitung jarak antara data point baru dengan data point yang ada
        $distances = [];
        foreach ($dataPoints as $dataPoint) {
            $distance = sqrt(
                pow($dataPoint->kecepatan_maks - $kecepatan_maks, 2) +
                pow($dataPoint->konsumsi_bb - $konsumsi_bb, 2)
            );
            $distances[] = [
                'kecepatan_maks' => $dataPoint->kecepatan_maks,
                'konsumsi_bb' => $dataPoint->konsumsi_bb,
                'tipe_kendaraan' => $dataPoint->tipe_kendaraan,
                'distance' => $distance
            ];
        }

        $unsortedDistances = $distances;

        // Urutkan berdasarkan jarak terdekat
        usort($distances, function ($a, $b) {
            return $a['distance'] <=> $b['distance'];
        });

        // Ambil k tetangga terdekat
        $neighbors = array_slice($distances, 0, $k);

        // Tentukan kelas berdasarkan tetangga terdekat
        $tipe_kendaraans = array_column($neighbors, 'tipe_kendaraan');
        $tipe_kendaraanCounts = array_count_values($tipe_kendaraans);
        arsort($tipe_kendaraanCounts);
        $predictedTipeKendaraan = array_key_first($tipe_kendaraanCounts);

        // Simpan data baru ke database
        DataPoint::create([
            'kecepatan_maks' => $kecepatan_maks,
            'konsumsi_bb' => $konsumsi_bb,
            'tipe_kendaraan' => $predictedTipeKendaraan
        ]);

        return view('pages.classify', [
            'predicted_tipe_kendaraan' => $predictedTipeKendaraan,
            'unsortedDistances' => $unsortedDistances,
            'neighbors' => $neighbors,
            'kecepatan_maks' => $kecepatan_maks,
            'konsumsi_bb' => $konsumsi_bb,
            'k' => $k,
            'tipe_kendaraanCounts' => $tipe_kendaraanCounts
        ]);
    }
}
