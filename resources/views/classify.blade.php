<!DOCTYPE html>
<html>

<head>
    <title>KNN Method</title>

    {{-- Bootstrap CSS --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container py-5 mb-5">
        <h1>KNN Method</h1>
        <form method="POST" action="/classify">
            @csrf
            <div class="form-group">
                <label for="kecepatan_maks">Kecepatan Maks:</label>
                <input type="number" step="0.01" class="form-control" id="kecepatan_maks" name="kecepatan_maks"
                    required>
            </div>
            <div class="form-group">
                <label for="konsumsi_bb">Konsumsi BB:</label>
                <input type="number" step="0.01" class="form-control" id="konsumsi_bb" name="konsumsi_bb" required>
            </div>
            <div class="form-group">
                <label for="k">K:</label>
                <input type="number" class="form-control" id="k" name="k" required>
            </div>
            <button type="submit" class="btn btn-primary">Classify</button>
        </form>

        @if (isset($predicted_tipe_kendaraan))
            <h3 class="mt-2">Data Input</h3>
            <p>Kecepatan Maks: {{ $kecepatan_maks }}</p>
            <p>Konsumsi BB: {{ $konsumsi_bb }}</p>
            <p>K: {{ $k }}</p>

            <h3>Perhitungan Jarak</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>Kecepatan Maks</th>
                        <th>Konsumsi BB</th>
                        <th>Tipe Kendaraan</th>
                        <th>Jarak</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($distances as $distance)
                        <tr>
                            <td>{{ $distance['kecepatan_maks'] }}</td>
                            <td>{{ $distance['konsumsi_bb'] }}</td>
                            <td>{{ $distance['tipe_kendaraan'] }}</td>
                            <td>{{ $distance['distance'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <h3>Data Tetangga</h3>
            <table class="table">
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

            <h3>Jumlah Data</h3>
            <table class="table">
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
            <h2>Maka Tipe Kendaraan: {{ $predicted_tipe_kendaraan }}</h2>
        @endif

    </div>
</body>

</html>
