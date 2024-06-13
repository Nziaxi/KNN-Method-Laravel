<?php

namespace App\Http\Controllers;

use App\Models\DataPoint;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $dataPoints = DataPoint::paginate(10);
        return view('pages.dashboard', ['dataPoints' => $dataPoints]);
    }
}
