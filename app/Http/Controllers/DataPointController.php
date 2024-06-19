<?php

namespace App\Http\Controllers;

use App\Models\DataPoint;
use Illuminate\Http\Request;

class DataPointController extends Controller
{
    public function index()
    {
        $dataPoints = DataPoint::paginate(10);
        return view('pages.customize.index', ['dataPoints' => $dataPoints]);
    }

    public function create()
    {
        return view('pages.customize.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kecepatan_maks' => 'required|numeric',
            'konsumsi_bb' => 'required|numeric',
            'tipe_kendaraan' => 'required|string|max:255'
        ]);

        DataPoint::create([
            'kecepatan_maks' => $request->kecepatan_maks,
            'konsumsi_bb' => $request->konsumsi_bb,
            'tipe_kendaraan' => $request->tipe_kendaraan,
        ]);

        return redirect('/costumize')->with('status', ['message' => 'Data Berhasil Ditambahkan', 'type' => 'success']);
    }

    public function edit(int $id)
    {
        $dataPoint = DataPoint::findOrFail($id);
        return view('pages.customize.edit', ['dataPoint' => $dataPoint]);
    }

    public function update(Request $request, int $id)
    {
        $request->validate([
            'kecepatan_maks' => 'required|numeric',
            'konsumsi_bb' => 'required|numeric',
            'tipe_kendaraan' => 'required|string|max:255',
        ]);

        DataPoint::findOrFail($id)->update([
            'kecepatan_maks' => $request->kecepatan_maks,
            'konsumsi_bb' => $request->konsumsi_bb,
            'tipe_kendaraan' => $request->tipe_kendaraan,
        ]);

        return redirect('/costumize')->with('status', ['message' => 'Data Berhasil Diperbarui', 'type' => 'primary']);
    }

    public function destroy(int $id)
    {
        $dataPoint = DataPoint::findOrFail($id);
        $dataPoint->delete();

        return redirect('/costumize')->with('status', ['message' => 'Data Berhasil Dihapus', 'type' => 'danger']);
    }
}
