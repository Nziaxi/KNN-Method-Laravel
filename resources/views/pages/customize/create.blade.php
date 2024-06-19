@extends('layouts.master')

@section('title')
    Create Data
@endsection

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Create Data</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="/costumize">Customize</a></li>
                    <li class="breadcrumb-item active">Create Data</li>
                </ol>
            </nav>
        </div>
        <!-- End Page Title -->

        <section class="section dashboard">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Create Data</h5>

                    <!-- Vertical Form -->
                    <form class="row g-3" method="POST" action="{{ url('/costumize/create') }}">
                        @csrf
                        <div class="col-12">
                            <label for="kecepatan_maks" class="form-label">Kecepatan Maks:</label>
                            <input type="number" step="0.01" class="form-control" id="kecepatan_maks"
                                name="kecepatan_maks" required>
                        </div>
                        <div class="col-12">
                            <label for="konsumsi_bb" class="form-label">Konsumsi BB:</label>
                            <input type="number" step="0.01" class="form-control" id="konsumsi_bb" name="konsumsi_bb"
                                required>
                        </div>
                        <div class="col-12">
                            <label for="tipe_kendaraan" class="form-label">Tipe Kendaraan:</label>
                            <input type="text" class="form-control" id="tipe_kendaraan" name="tipe_kendaraan" required>
                        </div>
                        <div class="text-start">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a type="submit" class="btn btn-secondary" href="/costumize">Back</a>
                        </div>
                    </form>
                    <!-- Vertical Form -->
                </div>
            </div>
        </section>
    </main>
@endsection
