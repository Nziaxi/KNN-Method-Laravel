@extends('layouts.master')

@section('title')
    Customize
@endsection

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Customize</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Customize</li>
                </ol>
            </nav>
        </div>
        <!-- End Page Title -->

        <section class="section dashboard">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Data Points</h5>
                    @if (session('status'))
                        <div class="alert alert-{{ session('status')['type'] }}">
                            {{ session('status')['message'] }}
                        </div>
                    @endif
                    <!-- Bordered Table -->
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kecepatan Maks</th>
                                <th>Konsumsi BB</th>
                                <th>Tipe Kendaraan</th>
                                <th>Action</th>
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
                                    <td>
                                        <a href="{{ url('/costumize/' . $dataPoint->id . '/edit') }}"
                                            class="btn btn-warning btn-sm">Edit</a>
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal{{ $dataPoint->id }}">
                                            Delete
                                        </button>

                                        <!-- Delete Modal -->
                                        <div class="modal fade" id="deleteModal{{ $dataPoint->id }}" tabindex="-1"
                                            aria-labelledby="deleteModalLabel{{ $dataPoint->id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel{{ $dataPoint->id }}">
                                                            Delete Data Point</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure you want to delete this data point?<br>
                                                        Kecepatan Maks : {{ $dataPoint->kecepatan_maks }}<br>
                                                        Konsumsi BB : {{ $dataPoint->konsumsi_bb }}<br>
                                                        Tipe Kendaraan : {{ $dataPoint->tipe_kendaraan }}
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <a href="{{ url('/costumize/' . $dataPoint->id . '/delete') }}"
                                                            class="btn btn-danger">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Delete Modal -->
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- End Bordered Table -->

                    <div class="d-flex justify-content-between">
                        <div>
                            <a href="{{ url('/costumize/create') }}" class="btn btn-primary">Create</a>
                        </div>
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
                        </nav>
                        <!-- End Disabled and active states -->
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection
