@extends('layouts.master')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Classify</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Classify</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">KNN Method</h5>

                    <!-- Vertical Form -->
                    <form class="row g-3" method="POST" action="/classify">
                        @csrf
                        <div class="col-12">
                            <label for="kecepatan_maks">Kecepatan Maksimal</label>
                            <input type="number" step="0.01" class="form-control" id="kecepatan_maks"
                                name="kecepatan_maks" required>
                        </div>
                        <div class="col-12">
                            <label for="konsumsi_bb">Konsumsi Bahan Bakar</label>
                            <input type="number" step="0.01" class="form-control" id="konsumsi_bb" name="konsumsi_bb"
                                required>
                        </div>
                        <div class="col-12">
                            <label for="k">Nilai K</label>
                            <input type="number" class="form-control" id="k" name="k" value="3">
                        </div>
                        <div class="text-start">
                            <button type="submit" class="btn btn-primary">Classify</button>
                        </div>
                    </form><!-- Vertical Form -->

                </div>
            </div>
            @if (isset($predicted_tipe_kendaraan))
                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title">Data Input</h5>
                        <label class="form-label">Kecepatan Maks: {{ $kecepatan_maks }}</label><br>
                        <label class="form-label">Konsumsi BB: {{ $konsumsi_bb }}</label><br>
                        <label class="form-label">K: {{ $k }}</label>

                        <h5 class="card-title">Perhitungan Jarak</h5>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Kecepatan Maks</th>
                                    <th>Konsumsi BB</th>
                                    <th>Tipe Kendaraan</th>
                                    <th>Jarak</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($unsortedDistances as $unsortedDistance)
                                    <tr>
                                        <td>{{ $unsortedDistance['kecepatan_maks'] }}</td>
                                        <td>{{ $unsortedDistance['konsumsi_bb'] }}</td>
                                        <td>{{ $unsortedDistance['tipe_kendaraan'] }}</td>
                                        <td>{{ $unsortedDistance['distance'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <h5 class="card-title">Data Tetangga</h5>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Kecepatan Maks</th>
                                    <th>Konsumsi BB</th>
                                    <th>Tipe Kendaraan</th>
                                    <th>Jarak</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($neighbors as $neighbor)
                                    <tr>
                                        <td>{{ $neighbor['kecepatan_maks'] }}</td>
                                        <td>{{ $neighbor['konsumsi_bb'] }}</td>
                                        <td>{{ $neighbor['tipe_kendaraan'] }}</td>
                                        <td>{{ $neighbor['distance'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <h5 class="card-title">Jumlah Data</h5>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Tipe Kendaraan</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tipe_kendaraanCounts as $tipe_kendaraan => $count)
                                    <tr>
                                        <td>{{ $tipe_kendaraan }}</td>
                                        <td>{{ $count }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <h5>Maka Tipe Kendaraan: {{ $predicted_tipe_kendaraan }}</h5>

                    </div>
                </div>
            @endif
        </section>

    </main>
@endsection
