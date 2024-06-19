@extends('layouts.master')

@section('title')
    Dashboard
@endsection

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Data Points</h5>
                    <!-- Bordered Table -->
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kecepatan Maks</th>
                                <th>Konsumsi BB</th>
                                <th>Tipe Kendaraan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $increment = ($dataPoints->currentPage() - 1) * $dataPoints->perPage() + 1;
                            @endphp
                            @foreach ($dataPoints as $dataPoint)
                                <tr>
                                    <td>{{ $increment++ }}</td>
                                    <td>{{ $dataPoint->kecepatan_maks }}</td>
                                    <td>{{ $dataPoint->konsumsi_bb }}</td>
                                    <td>{{ $dataPoint->tipe_kendaraan }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- End Bordered Table -->

                    <!-- Disabled and active states -->
                    <nav aria-label="...">
                        <ul class="pagination justify-content-end">
                            <li class="page-item {{ $dataPoints->currentPage() == 1 ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $dataPoints->previousPageUrl() }}">Previous</a>
                            </li>
                            @foreach ($dataPoints->getUrlRange(1, $dataPoints->lastPage()) as $page => $url)
                                <li class="page-item {{ $page == $dataPoints->currentPage() ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endforeach
                            <li
                                class="page-item {{ $dataPoints->currentPage() == $dataPoints->lastPage() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $dataPoints->nextPageUrl() }}">Next</a>
                            </li>
                        </ul>
                    </nav><!-- End Disabled and active states -->

                </div>
            </div>
        </section>

    </main>
@endsection
